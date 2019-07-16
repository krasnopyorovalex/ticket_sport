<?php

namespace App\Domain\Stage\Queries;

use App\Championship;
use App\Stage;

/**
 * Class GetAllStagesQuery
 * @package App\Domain\Stage\Queries
 */
class GetAllStagesQuery
{
    private $championship;

    /**
     * GetAllStagesQuery constructor.
     * @param Championship $championship
     */
    public function __construct(Championship $championship)
    {
        $this->championship = $championship;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return Stage::whereChampionshipId($this->championship->id)
            ->orderBy('pos')
            ->get();
    }
}
