<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Match extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    protected $with = [
        'championship',
        'stadium',
        'teamFirst',
        'teamSecond'
    ];

    /**
     * @return BelongsTo
     */
    public function championship(): BelongsTo
    {
        return $this->belongsTo(Championship::class);
    }

    /**
     * @return BelongsTo
     */
    public function stadium(): BelongsTo
    {
        return $this->belongsTo(Stadium::class);
    }

    /**
     * @return BelongsTo
     */
    public function teamFirst(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_first_id');
    }

    /**
     * @return BelongsTo
     */
    public function teamSecond(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_second_id');
    }
}
