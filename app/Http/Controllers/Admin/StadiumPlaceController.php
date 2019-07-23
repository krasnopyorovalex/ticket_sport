<?php

namespace App\Http\Controllers\Admin;

use App\Domain\Stadium\Queries\GetStadiumByIdQuery;
use App\Domain\StadiumPlace\Commands\CreateStadiumPlaceCommand;
use App\Domain\StadiumPlace\Commands\DeleteStadiumPlaceCommand;
use App\Domain\StadiumPlace\Commands\UpdateStadiumPlaceCommand;
use App\Domain\StadiumPlace\Queries\GetAllStadiumPlacesQuery;
use App\Domain\StadiumPlace\Queries\GetStadiumPlaceByIdQuery;
use App\Domain\StadiumPlace\Queries\UpdatePositionStadiumPlaceQuery;
use App\Http\Controllers\Controller;
use App\Stadium;
use Domain\StadiumPlace\Requests\CreateStadiumPlaceRequest;
use Domain\StadiumPlace\Requests\UpdateStadiumPlaceRequest;
use Domain\StadiumPlace\Requests\UpdatePositionStadiumPlaceRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Response;

/**
 * Class StadiumPlaceController
 * @package App\Http\Controllers\Admin
 */
class StadiumPlaceController extends Controller
{
    /**
     * @param Stadium $stadium
     * @return Factory|View
     */
    public function index(Stadium $stadium)
    {
        $stadiumPlaces = $this->dispatch(new GetAllstadiumPlacesQuery($stadium));

        return view('admin.stadium_places.index', [
            'stadiumPlaces' => $stadiumPlaces,
            'stadium' => $stadium
        ]);
    }

    /**
     * @param Stadium $stadium
     * @return Factory|View
     */
    public function create(Stadium $stadium)
    {
        return view('admin.stadium_places.create', [
            'stadium' => $stadium
        ]);
    }

    /**
     * @param CreateStadiumPlaceRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CreateStadiumPlaceRequest $request)
    {
        $this->dispatch(new CreateStadiumPlaceCommand($request));

        return redirect(route('admin.stadium_places.index', ['stadium' => $request->get('stadium_id')]));
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $stadiumPlace = $this->dispatch(new GetStadiumPlaceByIdQuery($id));

        return view('admin.stadium_places.edit', [
            'stadiumPlace' => $stadiumPlace
        ]);
    }

    /**
     * @param $id
     * @param UpdateStadiumPlaceRequest $request
     * @return RedirectResponse|Redirector
     */
    public function update($id, UpdateStadiumPlaceRequest $request)
    {
        $this->dispatch(new UpdateStadiumPlaceCommand($id, $request));
        $stadiumPlace = $this->dispatch(new GetStadiumPlaceByIdQuery($id));

        return redirect(route('admin.stadium_places.index', ['stadium' => $stadiumPlace->stadium->id]));
    }

    /**
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteStadiumPlaceCommand($id));
        $stadiumPlace = $this->dispatch(new GetStadiumPlaceByIdQuery($id));

        return redirect(route('admin.stadium_places.index', ['stadium' => $stadiumPlace->stadium->id]));
    }

    /**
     * @param UpdatePositionStadiumPlaceRequest $request
     * @return array
     */
    public function positions(UpdatePositionStadiumPlaceRequest $request): array
    {
        $this->dispatch(new UpdatePositionStadiumPlaceQuery($request->post('data')));

        return ['message' => 'Позиции мест обновлены'];
    }

    /**
     * @param int $stadium
     * @return Response
     */
    public function places(int $stadium): Response
    {
        $stadium = $this->dispatch(new GetStadiumByIdQuery($stadium));

        return response()
            ->view('layouts.partials.stadium_places', [
                'stadiumPlaces' => $stadium->stadiumPlaces
            ]);
    }
}
