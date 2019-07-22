<?php

namespace App\Http\Controllers\Api;


use App\Domain\Match\Queries\GetAllMatchesWithPaginateQuery;
use App\Domain\Match\Queries\GetMatchByIdQuery;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Illuminate\Http\Response;

/**
 * Class MatchController
 * @package App\Http\Controllers
 */
class MatchController extends Controller
{
    /**
     * @return Response
     */
    public function index(): Response
    {
        $matches = $this->dispatch(new GetAllMatchesWithPaginateQuery());

        return response()
            ->view('layouts.sections.matches', [
                'matches' => $matches
            ]);
    }

    /**
     * @param int $id
     * @return Factory|View
     */
    public function show(int $id)
    {
        $match = $this->dispatch(new GetMatchByIdQuery($id));

        return view('layouts.partials.tickets', ['match' => $match]);
    }

}
