<?php

namespace App\Http\Requests\Forms;

use App\Http\Requests\Request;

/**
 * Class RecallRequest
 * @package App\Http\Requests\Forms
 */
class RecallRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3',
            'phone' => 'required|string',
            'time' => 'string|nullable',
            'message' => 'string|nullable'
        ];
    }
}
