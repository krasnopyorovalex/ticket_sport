<?php

namespace Domain\StadiumPlace\Requests;

use App\Http\Requests\Request;

/**
 * Class UpdatePositionStadiumPlaceRequest
 * @package Domain\StadiumPlace\Requests
 */
class UpdatePositionStadiumPlaceRequest extends Request
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
