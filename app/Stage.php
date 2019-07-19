<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stage extends Model
{
    use MatchTrait;

    public $timestamps = false;

    protected $guarded = [];

    protected $with = ['matches','activeMatches'];

    /**
     * @return BelongsTo
     */
    public function championship(): BelongsTo
    {
        return $this->belongsTo(Championship::class);
    }

    /**
     * @return HasMany
     */
    public function matches(): HasMany
    {
        return $this->hasMany(Match::class);
    }

    /**
     * @return HasMany
     */
    public function activeMatches(): HasMany
    {
        return $this->hasMany(Match::class)->active();
    }
}
