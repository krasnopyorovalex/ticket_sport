<?php

namespace App\Domain\Stadium\Commands;

use App\Domain\Image\Commands\UploadImageCommand;
use App\Http\Requests\Request;
use App\Stadium;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateStadiumCommand
 * @package App\Domain\Stadium\Commands
 */
class CreateStadiumCommand
{
    use DispatchesJobs;

    private $request;

    /**
     * CreateStadiumCommand constructor.
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
        $stadium = new Stadium();
        $stadium->fill($this->request->all());
        $stadium->save();

        if ($this->request->has('image')) {
            return $this->dispatch(new UploadImageCommand($this->request, $stadium->id, Stadium::class));
        }

        return true;
    }

}
