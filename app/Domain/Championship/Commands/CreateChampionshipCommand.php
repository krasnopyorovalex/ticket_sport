<?php

namespace App\Domain\Championship\Commands;

use App\Domain\Image\Commands\UploadImageCommand;
use App\Http\Requests\Request;
use App\Championship;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateChampionshipCommand
 * @package App\Domain\Championship\Commands
 */
class CreateChampionshipCommand
{
    use DispatchesJobs;

    private $request;

    /**
     * CreateChampionshipCommand constructor.
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
        $championship = new Championship();
        $championship->fill($this->request->all());
        $championship->save();

        if ($this->request->has('image')) {
            return $this->dispatch(new UploadImageCommand($this->request, $championship->id, Championship::class));
        }

        return true;
    }

}
