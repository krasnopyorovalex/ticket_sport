<?php

namespace App\Http\Controllers\Admin;

use App\Championship;
use App\Domain\Stage\Queries\GetStageByIdQuery;
use App\Domain\Stage\Commands\CreateStageCommand;
use App\Domain\Stage\Commands\DeleteStageCommand;
use App\Domain\Stage\Commands\UpdateStageCommand;
use App\Domain\Stage\Queries\GetAllStagesQuery;
use App\Domain\Stage\Queries\UpdatePositionStageQuery;
use App\Http\Controllers\Controller;
use App\Stage;
use Domain\Stage\Requests\CreateStageRequest;
use Domain\Stage\Requests\UpdateStageRequest;
use Domain\Stage\Requests\UpdatePositionStageRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

/**
 * Class StageController
 * @package App\Http\Controllers\Admin
 */
class StageController extends Controller
{
    /**
     * @param Championship $championship
     * @return Factory|View
     */
    public function index(Championship $championship)
    {
        $stages = $this->dispatch(new GetAllStagesQuery($championship));

        return view('admin.stages.index', [
            'stages' => $stages,
            'championship' => $championship
        ]);
    }

    /**
     * @param Championship $championship
     * @return Factory|View
     */
    public function create(Championship $championship)
    {
        return view('admin.stages.create', [
            'championship' => $championship
        ]);
    }

    /**
     * @param CreateStageRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(CreateStageRequest $request)
    {
        $this->dispatch(new CreateStageCommand($request));

        return redirect(route('admin.stages.index', ['championship' => $request->get('championship_id')]));
    }

    /**
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $stage = $this->dispatch(new GetStageByIdQuery($id));

        return view('admin.stages.edit', [
            'stage' => $stage
        ]);
    }

    /**
     * @param $id
     * @param UpdateStageRequest $request
     * @return RedirectResponse|Redirector
     */
    public function update($id, UpdateStageRequest $request)
    {
        $this->dispatch(new UpdateStageCommand($id, $request));
        $stage = $this->dispatch(new GetStageByIdQuery($id));

        return redirect(route('admin.stages.index', ['stage' => $stage->championship->id]));
    }

    /**
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteStageCommand($id));
        $stage = $this->dispatch(new GetStageByIdQuery($id));

        return redirect(route('admin.stages.index', ['stage' => $stage->championship->id]));
    }

    /**
     * @param UpdatePositionStageRequest $request
     * @return array
     */
    public function positions(UpdatePositionStageRequest $request): array
    {
        $this->dispatch(new UpdatePositionStageQuery($request->post('data')));

        return ['message' => 'Позиции стадий чемпионата обновлены'];
    }
}
