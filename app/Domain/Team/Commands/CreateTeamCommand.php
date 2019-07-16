<?php

namespace App\Domain\Team\Commands;

use App\Domain\Image\Commands\UploadImageCommand;
use App\Http\Requests\Request;
use App\Team;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateTeamCommand
 * @package App\Domain\Team\Commands
 */
class CreateTeamCommand
{
    use DispatchesJobs;

    private $request;

    /**
     * CreateTeamCommand constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $Team = new Team();
        $Team->fill($this->request->all());
        $Team->save();

        if ($this->request->has('image')) {
            return $this->dispatch(new UploadImageCommand($this->request, $Team->id, Team::class));
        }

        return true;
    }

}
