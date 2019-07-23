<?php

namespace App\Domain\MatchPlace\Commands;

use App\Domain\MatchPlace\Queries\GetMatchPlaceByIdQuery;
use App\Domain\Image\Commands\DeleteImageCommand;
use App\MatchPlace;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class DeleteMatchPlaceCommand
 * @package App\Domain\MatchPlace\Commands
 */
class DeleteMatchPlaceCommand
{

    use DispatchesJobs;

    /**
     * @var int
     */
    private $id;

    /**
     * DeleteMatchPlaceCommand constructor.
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
        return MatchPlace::where('match_id', $this->id)->delete();
    }

}
