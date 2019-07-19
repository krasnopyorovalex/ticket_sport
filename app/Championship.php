<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Championship extends Model
{
    public $timestamps = false;

    protected $guarded = ['image'];

    protected $with = ['stages', 'image'];

    private $teams = [];

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
    public function stages(): HasMany
    {
        return $this->hasMany(Stage::class);
    }

    /**
     * @return array
     */
    public function getTeamsAttribute(): array
    {
        foreach ($this->stages as $stage) {

            if ($stage->activeMatches) {

                foreach ($stage->activeMatches as $match) {

                    $this->teams[$match->teamFirst->id] = $match->teamFirst;

                    $match->teamSecond ?
                        $this->teams[$match->teamSecond->id] = $match->teamSecond
                        : false;
                }
            }
        }

        return $this->teams;
    }
}
