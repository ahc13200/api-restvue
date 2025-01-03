<?php


namespace Modules\security\Http\Requests;


use Ronu\RestGenericClass\Core\Requests\BaseFormRequest;

class PermissionRequest extends BaseFormRequest
{

    const PATH_RULE = __DIR__ . '/../../Rules/PermissionRule.php';

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
            'permission.required' => 'El campo permiso es obligatorio.',
            'permission.max' => 'El permiso no puede tener más de 30 caracteres.',
            'permission.unique' => 'El permiso ya está en uso.',
            'description.required' => 'El campo descripción es obligatorio.',
            'description.max' => 'La descripción no puede tener más de 255 caracteres.',
            'module.required' => 'El campo módulo es obligatorio.',
            'module.max' => 'El módulo no puede tener más de 255 caracteres.',
            'event.required' => 'El campo evento es obligatorio.',
            'event.max' => 'El evento no puede tener más de 255 caracteres.',
            'id.unique' => 'Este ID ya está en uso.',
        ];
    }

}
