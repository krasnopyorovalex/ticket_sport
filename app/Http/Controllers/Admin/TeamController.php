<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Team\Commands\CreateTeamCommand;
use App\Domain\Team\Commands\DeleteTeamCommand;
use App\Domain\Team\Commands\UpdateTeamCommand;
use App\Domain\Team\Queries\GetAllTeamsQuery;
use App\Domain\Team\Queries\GetTeamByIdQuery;
use App\Http\Controllers\Controller;
use Domain\Team\Requests\CreateTeamRequest;
use Domain\Team\Requests\UpdateTeamRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

/**
 * Class CommandController
 * @package App\Http\Controllers\Admin
 */
class TeamController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $teams = $this->dispatch(new GetAllTeamsQuery);

        return view('admin.teams.index', [
            'teams' => $teams
        ]);
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.teams.create');
    }

    /**
     * @param CreateTeamRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CreateTeamRequest $request)
    {
        $this->dispatch(new CreateTeamCommand($request));

        return redirect(route('admin.teams.index'));
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $team = $this->dispatch(new GetTeamByIdQuery($id));

        return view('admin.teams.edit', [
            'team' => $team
        ]);
    }

    /**
     * @param $id
     * @param UpdateTeamRequest $request
     * @return RedirectResponse|Redirector
     */
    public function update($id, UpdateTeamRequest $request)
    {
        $this->dispatch(new UpdateTeamCommand($id, $request));

        return redirect(route('admin.teams.index'));
    }

    /**
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteTeamCommand($id));

        return redirect(route('admin.teams.index'));
    }
}
