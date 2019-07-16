<?php

namespace App\Domain\Match\Commands;

use App\Http\Requests\Request;
use App\Match;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateMatchCommand
 * @package App\Domain\Match\Commands
 */
class CreateMatchCommand
{
    use DispatchesJobs;

    private $request;

    /**
     * CreateMatchCommand constructor.
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
        $match = new Match();
        $match->fill($this->request->all());
        $match->save();

        return true;
    }

}
