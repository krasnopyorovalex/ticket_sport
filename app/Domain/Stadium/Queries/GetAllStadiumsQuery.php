<?php

namespace App\Domain\Stadium\Queries;

use App\Stadium;

/**
 * Class GetAllStadiumsQuery
 * @package App\Domain\Stadium\Queries
 */
class GetAllStadiumsQuery
{
    private static $stadiums;

    /**
     * Execute the job.
     */
    public function handle()
    {
        if (!self::$stadiums) {
            self::$stadiums = Stadium::with(['stadiumPlaces', 'image'])->get();
        }

        return self::$stadiums;
    }
}
