<?php

namespace App\Domain\Match\Commands;

use App\Domain\Image\Commands\DeleteImageCommand;
use App\Domain\Match\Queries\GetMatchByIdQuery;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class DeleteMatchCommand
 * @package App\Domain\Match\Commands
 */
class DeleteMatchCommand
{

    use DispatchesJobs;

    /**
     * @var int
     */
    private $id;

    /**
     * DeleteMatchCommand constructor.
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
        $match = $this->dispatch(new GetMatchByIdQuery($this->id));

        if ($match->image) {
            $this->dispatch(new DeleteImageCommand($match->image));
        }

        return $match->delete();
    }

}
