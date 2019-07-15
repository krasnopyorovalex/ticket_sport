<?php

namespace Domain\Championship\Requests;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class UpdatePositionChampionshipRequest
 * @package Domain\Championship\Requests
 */
class UpdatePositionChampionshipRequest extends Request
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
