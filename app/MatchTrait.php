<?php


namespace App;


use Illuminate\Database\Eloquent\Relations\HasOne;

trait MatchTrait
{
    /**
     * @return HasOne
     */
    public function match(): HasOne
    {
        return $this->hasOne(Match::class);
    }
}
