<?php

namespace App\Domain\Match\Queries;

use App\Match;
use App\stage;

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
    public function __construct(stage $stage)
    {
        $this->stage = $stage;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return Match::whereStageId($this->stage->id)->get();
    }
}
