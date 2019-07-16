<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Match\Queries\GetMatchByIdQuery;
use App\Domain\Match\Commands\CreateMatchCommand;
use App\Domain\Match\Commands\DeleteMatchCommand;
use App\Domain\Match\Commands\UpdateMatchCommand;
use App\Domain\Match\Queries\GetAllMatchesQuery;
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
        return view('admin.matches.create', [
            'stage' => $stage
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

        return view('admin.matches.edit', [
            'Match' => $match
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
        $this->dispatch(new DeleteMatchCommand($id));
        $match = $this->dispatch(new GetMatchByIdQuery($id));

        return redirect(route('admin.matches.index', ['Match' => $match->stage->id]));
    }
}
