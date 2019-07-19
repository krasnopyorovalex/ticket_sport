<?php

namespace Domain\StadiumPlace\Requests;

use App\Http\Requests\Request;

/**
 * Class CreateStadiumPlaceRequest
 * @package Domain\StadiumPlace\Requests
 */
class CreateStadiumPlaceRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'color' => 'required|max:7|min:7'
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
            'name.required' => 'Поле «Название» обязательно для заполнения',
            'color.required' => 'Поле «Ф» обязательно для заполнения'
        ];
    }
}
