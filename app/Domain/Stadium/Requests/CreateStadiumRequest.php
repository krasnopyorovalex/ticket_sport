<?php

namespace Domain\Stadium\Requests;

use App\Http\Requests\Request;

/**
 * Class CreateStadiumRequest
 * @package Domain\Stadium\Requests
 */
class CreateStadiumRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'location' => 'required|max:255',
            'image' => 'image'
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
