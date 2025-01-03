<?php


namespace Modules\stocktaking\Http\Requests;


use Ronu\RestGenericClass\Core\Requests\BaseFormRequest;

class InvoiceRequest extends BaseFormRequest
{

    const PATH_RULE = __DIR__ . '/../../Rules/InvoiceRule.php';

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
            'provider_id.required' => 'El campo proveedor es obligatorio.',
            'provider_id.exists' => 'El proveedor seleccionado no es válido.',
            'code.required' => 'El campo código es obligatorio.',
            'code.unique' => 'Ya existe una factura con ese código.',
            'id.unique' => 'Este ID ya está en uso.',
        ];
    }

}
