<?php

namespace App\Domain\StadiumPlace\Queries;

use App\Stadium;
use App\StadiumPlace;

/**
 * Class GetAllStadiumPlacesQuery
 * @package App\Domain\StadiumPlace\Queries
 */
class GetAllStadiumPlacesQuery
{
    private $stadium;

    /**
     * GetAllStadiumPlacesQuery constructor.
     * @param Stadium $stadium
     */
    public function __construct(Stadium $stadium)
    {
        $this->stadium = $stadium;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return StadiumPlace::where('stadium_id', $this->stadium->id)->orderBy('pos')->get();
    }
}
