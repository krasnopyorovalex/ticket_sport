<?php

namespace App\Domain\Championship\Commands;

use App\Domain\Image\Commands\DeleteImageCommand;
use App\Domain\Championship\Queries\GetChampionshipByIdQuery;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class DeleteChampionshipCommand
 * @package App\Domain\Championship\Commands
 */
class DeleteChampionshipCommand
{

    use DispatchesJobs;

    /**
     * @var int
     */
    private $id;

    /**
     * DeleteChampionshipCommand constructor.
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
        $championship = $this->dispatch(new GetChampionshipByIdQuery($this->id));

        if ($championship->image) {
            $this->dispatch(new DeleteImageCommand($championship->image));
        }

        return $championship->delete();
    }

}
