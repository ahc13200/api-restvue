<?php


namespace Modules\nomenclature\Http\Requests;


use Ronu\RestGenericClass\Core\Requests\BaseFormRequest;

class CategoryRequest extends BaseFormRequest
{

    const PATH_RULE = __DIR__ . '/../../Rules/CategoryRule.php';

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
            'category_id.exists' => 'La categoría seleccionada no es válida.',
            'name.required' => 'El campo nombre es obligatorio.',
            'name.max' => 'El nombre no puede tener más de 30 caracteres.',
            'name.unique' => 'El nombre ya está en uso.',
            'description.max' => 'La descripción no puede tener más de 255 caracteres.',
            'id.unique' => 'El ID proporcionado ya está en uso.',
        ];
    }

}
