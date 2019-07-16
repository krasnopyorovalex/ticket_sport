<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StadiumPlace extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function stadium(): BelongsTo
    {
        return $this->belongsTo(Stadium::class);
    }

}
