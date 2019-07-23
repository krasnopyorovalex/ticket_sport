<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    public $timestamps = false;

    protected $guarded = ['image'];

    /**
     * @return MorphOne
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * @return HasMany
     */
    public function matchesFirst(): HasMany
    {
        return $this->hasMany(Match::class, 'team_first_id')->orderBy('start_datetime');
    }

    /**
     * @return HasMany
     */
    public function matchesSecond(): HasMany
    {
        return $this->hasMany(Match::class, 'team_second_id')->orderBy('start_datetime');
    }
}
