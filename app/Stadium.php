<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stadium extends Model
{
    public $timestamps = false;

    protected $table = 'stadiums';

    protected $guarded = ['image'];

    /**
     * @return HasMany
     */
    public function stadiumPlaces(): HasMany
    {
        return $this->hasMany(StadiumPlace::class);
    }

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
    public function matches(): HasMany
    {
        return $this->hasMany(Match::class);
    }
}
