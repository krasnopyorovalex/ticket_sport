<?php

namespace App\Domain\StadiumPlace\Commands;

use App\Domain\StadiumPlace\Queries\GetStadiumPlaceByIdQuery;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class DeleteStadiumPlaceCommand
 * @package App\Domain\StadiumPlace\Commands
 */
class DeleteStadiumPlaceCommand
{

    use DispatchesJobs;

    /**
     * @var int
     */
    private $id;

    /**
     * DeleteStadiumPlaceCommand constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(): bool
    {
        $stadiumPlace = $this->dispatch(new GetStadiumPlaceByIdQuery($this->id));

        return $stadiumPlace->delete();
    }

}
