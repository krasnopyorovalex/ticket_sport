<?php

namespace App\Http\Controllers\Api;

use App\Domain\Stage\Queries\GetStageByIdWithTeamQuery;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class StageController
 * @package App\Http\Controllers\Api
 */
class StageController extends Controller
{
    /**
     * @param int $stage
     * @param int $team
     * @return Factory|View|string
     */
    public function show(int $stage, int $team)
    {
        $stage = $this->dispatch(new GetStageByIdWithTeamQuery($stage, $team));

        return view('layouts.sections.matches', ['matches' => $stage->matches]);
    }

}
