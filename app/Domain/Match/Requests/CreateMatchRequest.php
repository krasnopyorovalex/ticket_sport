<?php

namespace Domain\Match\Requests;

use App\Http\Requests\Request;

/**
 * Class CreateMatchRequest
 * @package Domain\Match\Requests
 */
class CreateMatchRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
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
            'name.required' => 'Поле «Название» обязательно для заполнения'
        ];
    }
}
