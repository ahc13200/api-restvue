<?php


namespace Modules\stocktaking\Http\Requests;


use Ronu\RestGenericClass\Core\Requests\BaseFormRequest;

class OrderRequest extends BaseFormRequest
{

    const PATH_RULE = __DIR__ . '/../../Rules/OrderRule.php';

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
            'date.date' => 'El campo fecha debe ser una fecha válida.',
            'type_payment.required' => 'El campo tipo de pago es requerido.',
            'type_payment.max' => 'El campo tipo de pago no puede tener más de 255 caracteres.',
            'client_id.required_if' => 'El campo cliente es obligatorio.',
            'client_id.exists' => 'El cliente seleccionado no es válido.',
            'client.required_if' => 'El array client es obligatorio',
            'id.unique' => 'Este ID ya está en uso.',
        ];
    }

}
