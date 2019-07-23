<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MatchPlace extends Model
{
    use MatchTrait;

    public $guarded = [];

    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function stadiumPlace(): BelongsTo
    {
        return $this->belongsTo(StadiumPlace::class)->orderBy('pos');
    }
}
