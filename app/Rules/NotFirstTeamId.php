<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NotFirstTeamId implements Rule
{
    /**
     * @var int
     */
    private $team;

    /**
     * NotFirstTeamId constructor.
     * @param int $team
     */
    public function __construct(int $team)
    {
        $this->team = $team;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return ! ($this->team === (int)$value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Команда не может играть сама с собой';
    }
}
