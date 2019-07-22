<?php

namespace App\Domain\Team\Queries;

use App\Team;

/**
 * Class GetAllTeamsQuery
 * @package App\Domain\Team\Queries
 */
class GetAllTeamsQuery
{
    /**
     * Execute the job.
     */
    public function handle()
    {
        return Team::with(['image'])->orderBy('pos')->get();
    }
}
