<?php

namespace App\Domain\StadiumPlace\Commands;

use App\Domain\StadiumPlace\Queries\GetStadiumPlaceByIdQuery;
use App\Http\Requests\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateStadiumPlaceCommand
 * @package App\Domain\StadiumPlace\Commands
 */
class UpdateStadiumPlaceCommand
{

    use DispatchesJobs;

    private $request;
    private $id;

    /**
     * UpdateStadiumPlaceCommand constructor.
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
        $stadiumPlace = $this->dispatch(new GetStadiumPlaceByIdQuery($this->id));

        return $stadiumPlace->update($this->request->all());
    }
}
