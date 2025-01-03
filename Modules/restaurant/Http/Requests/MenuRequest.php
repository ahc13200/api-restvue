<?php


namespace Modules\restaurant\Http\Requests;


use Ronu\RestGenericClass\Core\Requests\BaseFormRequest;

class MenuRequest extends BaseFormRequest
{

    const PATH_RULE = __DIR__ . '/../../Rules/MenuRule.php';

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
            'meal_type.max' => 'El tipo de menú no puede tener más de 30 caracteres.',
            'meal_type.unique' => 'El tipo de menú ya está en uso.',
            'id.unique' => 'Este ID ya está en uso.',
        ];
    }

}
