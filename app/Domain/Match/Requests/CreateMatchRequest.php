<?php

namespace Domain\Match\Requests;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class CreateMatchRequest
 * @package Domain\Match\Requests
 */
class CreateMatchRequest extends Request
{
    public function rules(): array
    {
        return [
            'stage_id' => 'required|integer|exists:stages,id',
            'stadium_id' => 'required|integer|exists:stadiums,id',
            'team_first_id' => 'required|integer|exists:teams,id',
            'team_second_id' => 'integer|exists:teams,id|nullable',
            'is_popular' => Rule::in(['0','1']),
            'status' => Rule::in(['0','1']),
            'start_datetime' => 'required|date_format:"Y-m-d H:i:s"',
            'text' => 'string|nullable',
            'places' => 'array'
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
            'stage_id.required' => 'Поле «Этап» обязательно для заполнения',
            'stadium_id.required' => 'Поле «Стадион» обязательно для заполнения',
            'team_first_id.required' => 'Поле «Первая команда» обязательно для заполнения',
            'start_datetime.required' => 'Поле «Время начала матча» обязательно для заполнения',
        ];
    }
}
