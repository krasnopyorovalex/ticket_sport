<?php

namespace App\Domain\Stage\Commands;

use App\Domain\Stage\Queries\GetStageByIdQuery;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class DeleteStageCommand
 * @package App\Domain\Stage\Commands
 */
class DeleteStageCommand
{

    use DispatchesJobs;

    /**
     * @var int
     */
    private $id;

    /**
     * DeleteStageCommand constructor.
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
        $stage = $this->dispatch(new GetStageByIdQuery($this->id));

        return $stage->delete();
    }

}
