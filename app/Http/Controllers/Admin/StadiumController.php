<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Stadium\Commands\CreateStadiumCommand;
use App\Domain\Stadium\Commands\DeleteStadiumCommand;
use App\Domain\Stadium\Commands\UpdateStadiumCommand;
use App\Domain\Stadium\Queries\GetAllStadiumsQuery;
use App\Domain\Stadium\Queries\GetStadiumByIdQuery;
use App\Http\Controllers\Controller;
use Domain\Stadium\Requests\CreateStadiumRequest;
use Domain\Stadium\Requests\UpdateStadiumRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

/**
 * Class StadiumController
 * @package App\Http\Controllers\Admin
 */
class StadiumController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $stadiums = $this->dispatch(new GetAllStadiumsQuery);

        return view('admin.stadiums.index', [
            'stadiums' => $stadiums
        ]);
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        return view('admin.stadiums.create');
    }

    /**
     * @param CreateStadiumRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CreateStadiumRequest $request)
    {
        $this->dispatch(new CreateStadiumCommand($request));

        return redirect(route('admin.stadiums.index'));
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $stadium = $this->dispatch(new GetStadiumByIdQuery($id));

        return view('admin.stadiums.edit', [
            'stadium' => $stadium
        ]);
    }

    /**
     * @param $id
     * @param UpdateStadiumRequest $request
     * @return RedirectResponse|Redirector
     */
    public function update($id, UpdateStadiumRequest $request)
    {
        $this->dispatch(new UpdateStadiumCommand($id, $request));

        return redirect(route('admin.stadiums.index'));
    }

    /**
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteStadiumCommand($id));

        return redirect(route('admin.stadiums.index'));
    }
}
