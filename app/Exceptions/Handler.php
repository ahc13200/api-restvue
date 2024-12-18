<?php

namespace App\Exceptions;


use App\Models\Error_logs;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        $status = 500;
        $error = [];
        $result = ['success' => false, 'message' => $e->getMessage(), 'errors' => $error];
        if ($e instanceof ValidationException) {
            $error = $e->validator->errors();
            if (isset($error->messages()['login'])) {
                $message = $error->messages()['error'][0];
                $result['message'] = $message;
                $status = $e->status;
            } else {
                $result = ['success' => false, 'message' => $e->getMessage(), 'errors' => $error->getMessages()];
                $status = 406;
            }
        } elseif ($e instanceof HttpException) {
            $status = $e->getStatusCode();
        } elseif ($e instanceof AuthenticationException) {
            $status = 403;
        } elseif ($e instanceof ModelNotFoundException) {
            $status = 404;
        } else {
            $error = ['file' => $e->getFile(), 'line' => $e->getLine()];
            $result['errors'] = $error;
        }
        $log = env('LOG_ERROR', false);
        $log_error_in_request = env('LOG_ERROR_IN_REQUEST', false);
        $no_log_error = env('NO_LOG_ERROR', '*');
        $user = !str_ends_with($e->getFile(), "Lcobucci.php") ? auth()->user() : "";
        if ($log && !($e instanceof ValidationException)) {
            if (!in_array($status, explode(',', $no_log_error))) {
                $error_log = Error_logs::create(
                    [
                        "description" => $e->getMessage(),
                        "error" => json_encode($result['errors']),
                        "parameters" => json_encode(array_merge($request->json()->all())),
                        "path" => $request->path(),
                        "headers" => json_encode($request->header()),
                        "request" => json_encode($request),
                        "ip" => $request->getClientIp(),
                        "user_id" => $user ? $user->id : 'Not Logged',
                        "username" => $user ? $user->name : 'Not Logged',
                        "status_code" => $status,
                        "created_at" => date('Y-m-d h:m:s a'),
                        "updated_at" => date('Y-m-d h:m:s a'),
                    ]
                );
                $result = array_merge(
                    [
                        'id' => $error_log->id,
                        ...($log_error_in_request ? ['description' => $error_log->description] : []),
                        ...($log_error_in_request ? ['error' => json_decode($error_log->error)] : []),
                        'note' => 'An error has ocurred with id:' . $error_log->id . ' contact the administrators for more information'
                    ]);
            }
        } elseif (!$log_error_in_request && str_starts_with(strval($status), '5')) {
            $result['errors'] = [];
            $result['message'] = 'There is an internal server error';
        }

        return response()->json($result, $status);
    }
}


