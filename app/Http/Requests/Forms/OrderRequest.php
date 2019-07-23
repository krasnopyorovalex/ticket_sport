<?php

namespace App\Http\Requests\Forms;

use App\Http\Requests\Request;

/**
 * Class OrderRequest
 * @package App\Http\Requests\Forms
 */
class OrderRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2',
            'phone' => 'required|string',
            'email' => 'required|email',
            'match' => 'required|string',
            'ticket' => 'required|string'
        ];
    }
}
