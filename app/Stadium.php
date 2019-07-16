<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stadium extends Model
{
    use MatchTrait;

    public $timestamps = false;

    protected $table = 'stadiums';

    protected $guarded = ['image'];

    protected $with = ['stadiumPlaces', 'image'];

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
}
