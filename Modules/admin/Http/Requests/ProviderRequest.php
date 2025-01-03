<?php


namespace Modules\admin\Http\Requests;


use Ronu\RestGenericClass\Core\Requests\BaseFormRequest;

class ProviderRequest extends BaseFormRequest
{

    const PATH_RULE = __DIR__ . '/../../Rules/ProviderRule.php';

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
            'identification.max' => 'La identificación no puede tener más de 15 caracteres.',
            'phone.max' => 'El teléfono no puede tener más de 8 caracteres.',
            'phone.unique' => 'El teléfono ya está registrado.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.max' => 'El correo electrónico no puede tener más de 30 caracteres.',
            'email.unique' => 'El email del proveedor ya está registrado.',
            'country.required' => 'El campo país es obligatorio.',
            'country.max' => 'El país no puede tener más de 30 caracteres.',
            'city.required' => 'El campo ciudad es obligatorio.',
            'city.max' => 'La ciudad no puede tener más de 30 caracteres.',
            'classification.max' => 'La clasificación no puede tener más de 10 caracteres.',
            'fax.max' => 'El fax no puede tener más de 15 caracteres.',
            'observations.max' => 'Las observaciones no pueden tener más de 300 caracteres.',
            'address.max' => 'La dirección no puede tener más de 50 caracteres.',
            'postal_code.max' => 'El código postal no puede tener más de 8 caracteres.',
            'postal_code.min' => 'El código postal debe tener al menos 5 caracteres.',
            'id.unique' => 'El ID proporcionado ya está en uso.',
        ];
    }

}
