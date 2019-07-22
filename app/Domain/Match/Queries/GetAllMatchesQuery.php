<?php

namespace App\Domain\Match\Queries;

use App\Match;
use App\Stage;

/**
 * Class GetAllMatchesQuery
 * @package App\Domain\Match\Queries
 */
class GetAllMatchesQuery
{
    private $stage;

    /**
     * GetAllMatchesQuery constructor.
     * @param stage $stage
     */
    public function __construct(Stage $stage)
    {
        $this->stage = $stage;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return Match::whereStageId($this->stage->id)
            ->orderBy('start_datetime', 'desc')
            ->get();
    }
}
