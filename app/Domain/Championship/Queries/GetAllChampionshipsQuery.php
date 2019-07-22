<?php

namespace App\Domain\Championship\Queries;

use App\Championship;

/**
 * Class GetAllChampionshipsQuery
 * @package App\Domain\Championship\Queries
 */
class GetAllChampionshipsQuery
{
    private static $championships;

    /**
     * Execute the job.
     */
    public function handle()
    {
        if (!self::$championships) {
            self::$championships = Championship::with(['stages', 'image'])->orderBy('pos')->get();
        }

        return self::$championships;
    }
}
