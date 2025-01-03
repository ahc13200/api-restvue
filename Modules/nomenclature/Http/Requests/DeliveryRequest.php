<?php


namespace Modules\nomenclature\Http\Requests;


use Ronu\RestGenericClass\Core\Requests\BaseFormRequest;

class DeliveryRequest extends BaseFormRequest
{

    const PATH_RULE = __DIR__ . '/../../Rules/DeliveryRule.php';

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
            'city.required' => 'El campo ciudad es obligatorio.',
            'city.max' => 'La ciudad no puede tener más de 30 caracteres.',
            'city.unique' => 'La ciudad ya está registrada.',
            'amount.max' => 'El coste no puede tener más de 20 caracteres.',
            'id.unique' => 'El ID proporcionado ya está en uso.',
        ];
    }

}
