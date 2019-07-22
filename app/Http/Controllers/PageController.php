<?php

namespace App\Http\Controllers;

use App\Domain\Championship\Queries\GetAllChampionshipsQuery;
use App\Domain\Match\Queries\GetAllMatchesWithPaginateQuery;
use App\Domain\Match\Queries\GetAllPopularMatchesQuery;
use App\Domain\Slider\Queries\GetSliderByIdQuery;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class PageController
 * @package App\Http\Controllers
 */
class PageController extends Controller
{
    /**
     * @return Factory|View
     */
    public function show()
    {
        $popularMatches = $this->dispatch(new GetAllPopularMatchesQuery);
        $championships = $this->dispatch(new GetAllChampionshipsQuery);
        $slider = $this->dispatch(new GetSliderByIdQuery(1));
        $matches = $this->dispatch(new GetAllMatchesWithPaginateQuery());

        return view('page.index', [
            'popularMatches' => $popularMatches,
            'championships' => $championships,
            'slider' => $slider,
            'matches' => $matches
        ]);
    }
}
