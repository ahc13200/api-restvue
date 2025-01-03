<?php


namespace Modules\admin\Http\Requests;


use Ronu\RestGenericClass\Core\Requests\BaseFormRequest;

class WorkerRequest extends BaseFormRequest
{

    const PATH_RULE = __DIR__ . '/../../Rules/WorkerRule.php';

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return $this->parseRules(self::PATH_RULE);
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.max' => 'El nombre no puede tener más de 30 caracteres.',
            'image.max' => 'La imagen no puede tener más de 500 caracteres.',
            'phone.required' => 'El campo teléfono es obligatorio.',
            'phone.max' => 'El teléfono no puede tener más de 8 caracteres.',
            'phone.unique' => 'El teléfono ya está en uso.',
            'lastname.max' => 'El apellido no puede tener más de 30 caracteres.',
            'username.required' => 'El campo nombre de usuario es obligatorio.',
            'username.max' => 'El nombre de usuario no puede tener más de 20 caracteres.',
            'username.unique' => 'El nombre de usuario ya está en uso.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.max' => 'La contraseña no puede tener más de 12 caracteres.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.max' => 'El correo electrónico no puede tener más de 30 caracteres.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            'id.unique' => 'El ID proporcionado ya está en uso.',
        ];
    }

}
