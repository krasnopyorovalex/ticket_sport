<?php

namespace App\Domain\Team\Queries;

use App\Team;

/**
 * Class GetTeamByNameQuery
 * @package App\Domain\Team\Queries
 */
class GetTeamByNameQuery
{
    /**
     * @var string
     */
    private $keyword;

    /**
     * GetTeamByNameQuery constructor.
     * @param string $keyword
     */
    public function __construct(string $keyword)
    {
        $this->keyword = $keyword;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return Team::where('name', 'like', '%' . $this->keyword . '%')
            ->with(['matchesFirst', 'matchesSecond'])
            ->first();
    }
}
