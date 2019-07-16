<?php

namespace Domain\Stage\Requests;

use App\Http\Requests\Request;

/**
 * Class UpdatePositionStageRequest
 * @package Domain\Stage\Requests
 */
class UpdatePositionStageRequest extends Request
{
    public function rules(): array
    {
        return [
            'data' => 'required|array'
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
            'data.required' => 'Поле «Название» обязательно для заполнения'
        ];
    }
}
