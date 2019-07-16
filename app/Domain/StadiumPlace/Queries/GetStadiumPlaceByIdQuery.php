<?php

namespace App\Domain\StadiumPlace\Queries;

use App\StadiumPlace;

/**
 * Class GetStadiumPlaceByIdQuery
 * @package App\Domain\StadiumPlace\Queries
 */
class GetStadiumPlaceByIdQuery
{
    /**
     * @var int
     */
    private $id;

    /**
     * GetStadiumPlaceByIdQuery constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return StadiumPlace::findOrFail($this->id);
    }
}
