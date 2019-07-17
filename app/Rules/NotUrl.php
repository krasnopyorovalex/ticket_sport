<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NotUrl implements Rule
{
    /**
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        if (strstr($value,'http://') || strstr($value,'https://')) {
            return false;
        }

        return true;
    }

    /**
     * @return array|string
     */
    public function message()
    {
        return 'Нельзя вводить ссылки в описание заказа';
    }
}
