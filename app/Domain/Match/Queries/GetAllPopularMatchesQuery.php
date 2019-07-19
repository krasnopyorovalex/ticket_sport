<?php

namespace App\Domain\Match\Queries;

use App\Match;

/**
 * Class GetAllPopularMatchesQuery
 * @package App\Domain\Match\Queries
 */
class GetAllPopularMatchesQuery
{
    /**
     * Execute the job.
     */
    public function handle()
    {
        return Match::popular()
            ->active()
            ->orderBy('start_datetime', 'desc')
            ->get();
    }
}
