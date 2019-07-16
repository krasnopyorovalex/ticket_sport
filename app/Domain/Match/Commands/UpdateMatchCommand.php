<?php

namespace App\Domain\Match\Commands;

use App\Domain\Image\Commands\DeleteImageCommand;
use App\Domain\Image\Commands\UploadImageCommand;
use App\Domain\Match\Queries\GetMatchByIdQuery;
use App\Http\Requests\Request;
use App\Match;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateMatchCommand
 * @package App\Domain\Match\Commands
 */
class UpdateMatchCommand
{

    use DispatchesJobs;

    private $request;
    private $id;

    /**
     * UpdateMatchCommand constructor.
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
        $match = $this->dispatch(new GetMatchByIdQuery($this->id));

        if ($this->request->has('image')) {
            if ($match->image) {
                $this->dispatch(new DeleteImageCommand($match->image));
            }
            $this->dispatch(new UploadImageCommand($this->request, $match->id, Match::class));
        }

        return $match->update($this->request->all());
    }

}
