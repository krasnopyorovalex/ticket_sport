<?php

namespace App\Domain\Team\Queries;

use App\Http\Requests\Search\SearchRequest;
use App\Team;

/**
 * Class GetTeamByNameQuery
 * @package App\Domain\Team\Queries
 */
class GetTeamByNameQuery
{
    /**
     * @var SearchRequest
     */
    private $request;

    /**
     * GetTeamByNameQuery constructor.
     * @param SearchRequest $request
     */
    public function __construct(SearchRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return Team::where('name', 'like', '%' . $this->request->post('keyword') . '%')
            ->with(['matchesFirst', 'matchesSecond'])
            ->first();
    }
}
