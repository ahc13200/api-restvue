<?php


namespace Modules\stocktaking\Http\Requests;


use Ronu\RestGenericClass\Core\Requests\BaseFormRequest;

class Order_productRequest extends BaseFormRequest
{

    const PATH_RULE= __DIR__ . '/../../Rules/Order_productRule.php';
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

}
