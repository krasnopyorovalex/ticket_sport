<?php

namespace App\Domain\StadiumPlace\Commands;

use App\Http\Requests\Request;
use App\StadiumPlace;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateStadiumPlaceCommand
 * @package App\Domain\StadiumPlace\Commands
 */
class CreateStadiumPlaceCommand
{
    use DispatchesJobs;

    private $request;

    /**
     * CreateStadiumPlaceCommand constructor.
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
        $stadiumPlace = new StadiumPlace();
        $stadiumPlace->fill($this->request->all());

        return $stadiumPlace->save();
    }

}
