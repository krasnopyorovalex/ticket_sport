<?php

namespace Domain\Championship\Requests;

use App\Http\Requests\Request;

/**
 * Class CreateChampionshipRequest
 * @package Domain\Championship\Requests
 */
class CreateChampionshipRequest extends Request
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
