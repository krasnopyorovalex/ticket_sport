<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Search\SearchRequest;
use App\Services\SearchService;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class SearchController
 * @package App\Http\Controllers\Admin
 */
class SearchController extends Controller
{

    /**
     * @var SearchService
     */
    private $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    /**
     * @param SearchRequest $searchRequest
     * @return Factory|View
     */
    public function search(SearchRequest $searchRequest)
    {
        $matches = $this->searchService->search($searchRequest->post('keyword'));

        return view('admin.search_results', ['matches' => $matches]);
    }
}
