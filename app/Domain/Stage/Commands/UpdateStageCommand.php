<?php

namespace App\Domain\Stage\Commands;

use App\Domain\Stage\Queries\GetStageByIdQuery;
use App\Http\Requests\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateStageCommand
 * @package App\Domain\Stage\Commands
 */
class UpdateStageCommand
{

    use DispatchesJobs;

    private $request;
    private $id;

    /**
     * UpdateStageCommand constructor.
     * @param int $id
     * @param Request $request
     */
    public function __construct(int $id, Request $request)
    {
        $this->id = $id;
        $this->request = $request;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $stage = $this->dispatch(new GetStageByIdQuery($this->id));

        return $stage->update($this->request->all());
    }

}
