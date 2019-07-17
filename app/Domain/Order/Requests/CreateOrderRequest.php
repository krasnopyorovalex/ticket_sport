<?php

namespace Domain\Order\Requests;

use App\Http\Requests\Request;
use App\Rules\NotUrl;

/**
 * Class CreateOrderRequest
 * @package Domain\Order\Requests
 */
class CreateOrderRequest extends Request
{
    public function rules(): array
    {
        return [
            'match' => 'bail|required|string|max:255',
            'body' => ['required', 'string', new NotUrl],
            'created_at' => 'required|date_format:"Y-m-d H:i:s"',
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
            'body.required' => 'Поле «Текст заказа» обязательно для заполнения',
            'created_at.required' => 'Поле «Дата и время заказа» обязательно для заполнения'
        ];
    }
}
