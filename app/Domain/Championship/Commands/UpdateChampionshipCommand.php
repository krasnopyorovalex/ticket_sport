<?php

namespace App\Domain\Championship\Commands;

use App\Domain\Image\Commands\DeleteImageCommand;
use App\Domain\Image\Commands\UploadImageCommand;
use App\Domain\Championship\Queries\GetChampionshipByIdQuery;
use App\Http\Requests\Request;
use App\Championship;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateChampionshipCommand
 * @package App\Domain\Championship\Commands
 */
class UpdateChampionshipCommand
{

    use DispatchesJobs;

    private $request;
    private $id;

    /**
     * UpdateChampionshipCommand constructor.
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
        $championship = $this->dispatch(new GetChampionshipByIdQuery($this->id));

        if ($this->request->has('image')) {
            if ($championship->image) {
                $this->dispatch(new DeleteImageCommand($championship->image));
            }
            $this->dispatch(new UploadImageCommand($this->request, $championship->id, Championship::class));
        }

        return $championship->update($this->request->all());
    }

}
