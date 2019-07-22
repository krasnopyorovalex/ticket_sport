<?php

namespace Domain\Order\Requests;

use App\Http\Requests\Request;

/**
 * Class UpdateOrderRequest
 * @package Domain\Order\Requests
 */
class UpdateOrderRequest extends Request
{
    public function rules(): array
    {
        return [
            'match' => 'bail|required|string|max:255',
            'body' => 'required|string'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'match.required' => 'Поле «Матч» обязательно для заполнения',
            'body.required' => 'Поле «Текст заказа» обязательно для заполнения'
        ];
    }
}
