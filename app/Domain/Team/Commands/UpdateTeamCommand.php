<?php

namespace App\Domain\Team\Commands;

use App\Domain\Image\Commands\DeleteImageCommand;
use App\Domain\Image\Commands\UploadImageCommand;
use App\Domain\Team\Queries\GetTeamByIdQuery;
use App\Http\Requests\Request;
use App\Team;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateTeamCommand
 * @package App\Domain\Team\Commands
 */
class UpdateTeamCommand
{

    use DispatchesJobs;

    private $request;
    private $id;

    /**
     * UpdateTeamCommand constructor.
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
        $Team = $this->dispatch(new GetTeamByIdQuery($this->id));

        if ($this->request->has('image')) {
            if ($Team->image) {
                $this->dispatch(new DeleteImageCommand($Team->image));
            }
            $this->dispatch(new UploadImageCommand($this->request, $Team->id, Team::class));
        }

        return $Team->update($this->request->all());
    }

}
