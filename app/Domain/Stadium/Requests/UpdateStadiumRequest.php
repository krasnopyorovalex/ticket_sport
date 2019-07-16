<?php

namespace Domain\Stadium\Requests;

use App\Http\Requests\Request;

/**
 * Class UpdateStadiumRequest
 * @package Domain\Stadium\Requests
 */
class UpdateStadiumRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'bail|required|max:255',
            'location' => 'required|max:255',
            'image' => 'image',
            'imageAlt' => 'string|max:255',
            'imageTitle' => 'string|max:255'
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
            'location.required' => 'Поле «Расположение стадиона» обязательно для заполнения'
        ];
    }
}
