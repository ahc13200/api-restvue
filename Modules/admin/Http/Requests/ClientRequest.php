<?php


namespace Modules\admin\Http\Requests;


use Ronu\RestGenericClass\Core\Requests\BaseFormRequest;

class ClientRequest extends BaseFormRequest
{

    const PATH_RULE = __DIR__ . '/../../Rules/ClientRule.php';

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
            'name.max' => 'El nombre no puede tener más de 50 caracteres.',
            'phone.required' => 'El campo teléfono es obligatorio.',
            'phone.max' => 'El teléfono no puede tener más de 8 caracteres.',
            'phone.unique' => 'El teléfono ya está registrado en otro cliente.',
            'address.required' => 'El campo dirección es obligatorio.',
            'address.max' => 'La dirección no puede tener más de 255 caracteres.',
            'province.required' => 'El campo provincia es obligatorio.',
            'province.max' => 'La provincia no puede tener más de 255 caracteres.',
            'city.required' => 'El campo ciudad es obligatorio.',
            'city.max' => 'La ciudad no puede tener más de 255 caracteres.',
            'registered_in.in' => 'El valor de registrado en debe ser shopping o administración.',
            'id.unique' => 'El ID proporcionado ya está en uso.',
        ];
    }

}
