<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Match extends Model
{
    public $timestamps = false;

    protected $guarded = ['places'];

    /**
     * @return BelongsTo
     */
    public function stage(): BelongsTo
    {
        return $this->belongsTo(Stage::class);
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

    /**
     * @return HasMany
     */
    public function matchPlaces(): HasMany
    {
        return $this->hasMany(MatchPlace::class, 'match_id');
    }

    /**
     * @return BelongsToMany
     */
    public function stadiumPlaces(): BelongsToMany
    {
        return $this->belongsToMany(StadiumPlace::class, 'match_places', 'match_id', 'stadium_place_id');
    }

    /**
     * @return mixed
     */
    public function getDateAttribute()
    {
        return Carbon::parse($this->start_datetime)->format('Y-m-d');
    }

    /**
     * @return mixed
     */
    public function getTimeAttribute()
    {
        return Carbon::parse($this->start_datetime)->format('H:i');
    }


    /**
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('status', '1');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopePopular($query)
    {
        return $query->where('is_popular', '1');
    }
}
