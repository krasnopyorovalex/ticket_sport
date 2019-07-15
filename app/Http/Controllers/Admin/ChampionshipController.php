<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Championship\Commands\CreateChampionshipCommand;
use App\Domain\Championship\Commands\DeleteChampionshipCommand;
use App\Domain\Championship\Commands\UpdateChampionshipCommand;
use App\Domain\Championship\Queries\GetAllChampionshipsQuery;
use App\Domain\Championship\Queries\GetChampionshipByIdQuery;
use App\Domain\Championship\Queries\UpdatePositionChampionshipQuery;
use App\Http\Controllers\Controller;
use Domain\Championship\Requests\CreateChampionshipRequest;
use Domain\Championship\Requests\UpdateChampionshipRequest;
use Domain\Championship\Requests\UpdatePositionChampionshipRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

/**
 * Class ChampionshipController
 * @package App\Http\Controllers\Admin
 */
class ChampionshipController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $championships = $this->dispatch(new GetAllChampionshipsQuery);

        return view('admin.championships.index', [
            'championships' => $championships
        ]);
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.championships.create');
    }

    /**
     * @param CreateChampionshipRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CreateChampionshipRequest $request)
    {
        $this->dispatch(new CreateChampionshipCommand($request));

        return redirect(route('admin.championships.index'));
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $championship = $this->dispatch(new GetChampionshipByIdQuery($id));

        return view('admin.championships.edit', [
            'championship' => $championship
        ]);
    }

    /**
     * @param $id
     * @param UpdateChampionshipRequest $request
     * @return RedirectResponse|Redirector
     */
    public function update($id, UpdateChampionshipRequest $request)
    {
        $this->dispatch(new UpdateChampionshipCommand($id, $request));

        return redirect(route('admin.championships.index'));
    }

    /**
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteChampionshipCommand($id));

        return redirect(route('admin.championships.index'));
    }

    public function positions(UpdatePositionChampionshipRequest $request): array
    {
        $this->dispatch(new UpdatePositionChampionshipQuery($request->post('data')));

        return ['message' => 'Позиции чемпионатов обновлены'];
    }
}
