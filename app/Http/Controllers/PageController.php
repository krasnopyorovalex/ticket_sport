<?php

namespace App\Http\Controllers;

use App\Domain\Championship\Queries\GetAllChampionshipsQuery;
use App\Domain\Match\Queries\GetAllPopularMatchesQuery;
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

        return view('page.index', [
            'popularMatches' => $popularMatches,
            'championships' => $championships
        ]);
    }
}
