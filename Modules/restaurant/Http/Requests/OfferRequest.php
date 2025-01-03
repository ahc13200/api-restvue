<?php


namespace Modules\restaurant\Http\Requests;


use Ronu\RestGenericClass\Core\Requests\BaseFormRequest;

class OfferRequest extends BaseFormRequest
{

    const PATH_RULE = __DIR__ . '/../../Rules/OfferRule.php';

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
            'name.unique' => 'El nombre de la oferta ya está en uso.',
            'price.required' => 'El campo precio es obligatorio.',
            'description.required' => 'El campo descripción es obligatorio.',
            'description.max' => 'La descripción no puede tener más de 300 caracteres.',
            'id.unique' => 'Este ID ya está en uso.',
        ];
    }

}
