<?php

namespace App\Http\Controllers\Api;

use App\Domain\Team\Queries\GetTeamByNameQuery;
use App\Http\Controllers\Controller;
use App\Http\Requests\Search\SearchRequest;

/**
 * Class SearchController
 * @package App\Http\Controllers\Api
 */
class SearchController extends Controller
{
    /**
     * @param SearchRequest $searchRequest
     * @return mixed
     */
    public function search(SearchRequest $searchRequest)
    {
        $teams = $this->dispatch(new GetTeamByNameQuery($searchRequest->post('keyword')));

        $matches = $teams
            ? $teams->matchesFirst->merge($teams->matchesSecond)
            : [];

        return view('layouts.sections.matches', ['matches' => $matches]);
    }

}
