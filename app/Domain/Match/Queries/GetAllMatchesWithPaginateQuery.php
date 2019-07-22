<?php

namespace App\Domain\Match\Queries;

use App\Match;

/**
 * Class GetAllMatchesWithPaginateQuery
 * @package App\Domain\Match\Queries
 */
class GetAllMatchesWithPaginateQuery
{
    private const LIMIT = 1;

    /**
     * Execute the job.
     */
    public function handle()
    {
        return Match::active()
            ->with([
                'teamFirst.image',
                'teamSecond.image'
            ])
            ->orderBy('start_datetime')
            ->paginate(self::LIMIT);
    }
}
