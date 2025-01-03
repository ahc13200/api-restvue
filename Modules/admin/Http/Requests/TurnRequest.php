<?php


namespace Modules\admin\Http\Requests;


use Ronu\RestGenericClass\Core\Requests\BaseFormRequest;

class TurnRequest extends BaseFormRequest
{

    const PATH_RULE=__DIR__ . '/../../Rules/TurnRule.php';
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
            'code.required' => 'El campo código es obligatorio.',
            'code.max' => 'El código no puede tener más de 10 caracteres.',
            'code.unique' => 'El código ya está en uso.',
            'working_day.max' => 'La jornada laboral no puede tener más de 30 caracteres.',
            'entry_time.max' => 'La hora de entrada no puede tener más de 255 caracteres.',
            'departure_time.max' => 'La hora de salida no puede tener más de 255 caracteres.',
            'id.unique' => 'El ID proporcionado ya está en uso.',
        ];
    }

}
