<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Match\Queries\GetMatchByIdQuery;
use App\Domain\Match\Commands\CreateMatchCommand;
use App\Domain\Match\Commands\DeleteMatchCommand;
use App\Domain\Match\Commands\UpdateMatchCommand;
use App\Domain\Match\Queries\GetAllMatchesQuery;
use App\Domain\Stadium\Queries\GetAllStadiumsQuery;
use App\Domain\Stage\Queries\GetAllStagesQuery;
use App\Domain\Team\Queries\GetAllTeamsQuery;
use App\Http\Controllers\Controller;
use App\Stage;
use Domain\Match\Requests\CreateMatchRequest;
use Domain\Match\Requests\UpdateMatchRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

/**
 * Class MatchController
 * @package App\Http\Controllers\Admin
 */
class MatchController extends Controller
{
    /**
     * @param Stage $stage
     * @return Factory|View
     */
    public function index(Stage $stage)
    {
        $matches = $this->dispatch(new GetAllMatchesQuery($stage));

        return view('admin.matches.index', [
            'matches' => $matches,
            'stage' => $stage
        ]);
    }

    /**
     * @param Stage $stage
     * @return Factory|View
     */
    public function create(Stage $stage)
    {
        $stages = $this->dispatch(new GetAllStagesQuery(null));
        $stadiums = $this->dispatch(new GetAllStadiumsQuery());
        $teams = $this->dispatch(new GetAllTeamsQuery());

        return view('admin.matches.create', [
            'stage' => $stage,
            'stages' => $stages,
            'stadiums' => $stadiums,
            'stadiumFirst' => $stadiums->first(),
            'teams' => $teams
        ]);
    }

    /**
     * @param CreateMatchRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CreateMatchRequest $request)
    {
        $this->dispatch(new CreateMatchCommand($request));

        return redirect(route('admin.matches.index', ['stage' => $request->get('stage_id')]));
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $match = $this->dispatch(new GetMatchByIdQuery($id));
        $stages = $this->dispatch(new GetAllStagesQuery(null));
        $stadiums = $this->dispatch(new GetAllStadiumsQuery());
        $teams = $this->dispatch(new GetAllTeamsQuery());

        $match->matchPlaces = $match->matchPlaces->mapWithKeys(static function ($item) {
            return [$item->stadium_place_id => $item->price];
        });

        return view('admin.matches.edit', [
            'match' => $match,
            'stages' => $stages,
            'stadiums' => $stadiums,
            'teams' => $teams
        ]);
    }

    /**
     * @param $id
     * @param UpdateMatchRequest $request
     * @return RedirectResponse|Redirector
     */
    public function update($id, UpdateMatchRequest $request)
    {
        $this->dispatch(new UpdateMatchCommand($id, $request));
        $match = $this->dispatch(new GetMatchByIdQuery($id));

        return redirect(route('admin.matches.index', ['Match' => $match->stage->id]));
    }

    /**
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        $match = $this->dispatch(new GetMatchByIdQuery($id));

        $stage = $match->stage;

        $this->dispatch(new DeleteMatchCommand($id));

        return redirect(route('admin.matches.index', ['Match' => $stage->id]));
    }
}
