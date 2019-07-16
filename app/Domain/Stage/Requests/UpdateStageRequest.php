<?php

namespace Domain\Stage\Requests;

use App\Http\Requests\Request;

/**
 * Class UpdateStageRequest
 * @package Domain\Stage\Requests
 */
class UpdateStageRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'bail|required|max:255'
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
