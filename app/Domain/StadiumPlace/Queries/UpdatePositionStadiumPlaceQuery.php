<?php

namespace App\Domain\StadiumPlace\Queries;

use App\StadiumPlace;

/**
 * Class UpdatePositionStadiumPlaceQuery
 * @package App\Domain\StadiumPlace\Queries
 */
class UpdatePositionStadiumPlaceQuery
{
    /**
     * @var array
     */
    private $data;

    /**
     * UpdatePositionStadiumPlaceQuery constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->data as $position => $id) {
            StadiumPlace::where('id', $id)->update(['pos' => $position]);
        }
    }
}
