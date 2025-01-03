<?php


namespace Modules\security\Http\Requests;


use Ronu\RestGenericClass\Core\Requests\BaseFormRequest;

class RoleRequest extends BaseFormRequest
{

    const PATH_RULE = __DIR__ . '/../../Rules/RoleRule.php';

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
            'name.unique' => 'El nombre ya está en uso.',
            'description.required' => 'El campo descripción es obligatorio.',
            'description.max' => 'La descripción no puede tener más de 300 caracteres.',
            'id.unique' => 'El ID proporcionado ya está en uso.',
        ];
    }

}
