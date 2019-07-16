<?php

namespace App\Domain\Team\Commands;

use App\Domain\Image\Commands\DeleteImageCommand;
use App\Domain\Team\Queries\GetTeamByIdQuery;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class DeleteTeamCommand
 * @package App\Domain\Team\Commands
 */
class DeleteTeamCommand
{

    use DispatchesJobs;

    /**
     * @var int
     */
    private $id;

    /**
     * DeleteTeamCommand constructor.
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
        $Team = $this->dispatch(new GetTeamByIdQuery($this->id));

        if ($Team->image) {
            $this->dispatch(new DeleteImageCommand($Team->image));
        }

        return $Team->delete();
    }

}
