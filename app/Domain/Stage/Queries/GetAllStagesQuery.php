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
     * @param Championship|null $championship
     */
    public function __construct(?Championship $championship)
    {
        $this->championship = $championship;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $query = Stage::with(['matches'])->orderBy('pos');

        if ($this->championship) {
            $query->whereChampionshipId($this->championship->id);
        }

        return $query->get();
    }
}
