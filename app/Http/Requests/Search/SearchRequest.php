<?php

namespace App\Http\Requests\Search;

use App\Http\Requests\Request;

/**
 * Class SearchRequest
 * @package App\Http\Requests\Forms
 */
class SearchRequest extends Request
{
    public function rules(): array
    {
        return [
            'keyword' => 'required|string|min:3'
        ];
    }
}
