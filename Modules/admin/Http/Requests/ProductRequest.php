<?php


namespace Modules\admin\Http\Requests;


use Ronu\RestGenericClass\Core\Requests\BaseFormRequest;

class ProductRequest extends BaseFormRequest
{

    const PATH_RULE = __DIR__ . '/../../Rules/ProductRule.php';

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
            'code.required' => 'El campo código es obligatorio.',
            'code.max' => 'El código no puede tener más de 10 caracteres.',
            'code.unique' => 'El código ya está registrado en otro producto.',
            'category_id.required' => 'El campo categoría es obligatorio.',
            'category_id.exists' => 'La categoría seleccionada no es válida.',
            'unit_id.required' => 'El campo unidad de medida es obligatorio.',
            'unit_id.exists' => 'La unidad de medida seleccionada no es válida.',
            'id.unique' => 'El ID proporcionado ya está en uso.',
        ];
    }

}
