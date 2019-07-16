<?php

namespace App\Domain\Stadium\Commands;

use App\Domain\Image\Commands\DeleteImageCommand;
use App\Domain\Image\Commands\UploadImageCommand;
use App\Domain\Stadium\Queries\GetStadiumByIdQuery;
use App\Http\Requests\Request;
use App\Stadium;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateStadiumCommand
 * @package App\Domain\Stadium\Commands
 */
class UpdateStadiumCommand
{

    use DispatchesJobs;

    private $request;
    private $id;

    /**
     * UpdateStadiumCommand constructor.
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
        $stadium = $this->dispatch(new GetStadiumByIdQuery($this->id));

        if ($this->request->has('image')) {
            if ($stadium->image) {
                $this->dispatch(new DeleteImageCommand($stadium->image));
            }
            $this->dispatch(new UploadImageCommand($this->request, $stadium->id, Stadium::class));
        }

        return $stadium->update($this->request->all());
    }

}
