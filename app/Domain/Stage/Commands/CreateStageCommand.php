<?php

namespace App\Domain\Stage\Commands;

use App\Http\Requests\Request;
use App\Stage;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateStageCommand
 * @package App\Domain\Stage\Commands
 */
class CreateStageCommand
{
    use DispatchesJobs;

    private $request;

    /**
     * CreateStageCommand constructor.
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
        $stage = new Stage();
        $stage->fill($this->request->all());

        return $stage->save();
    }

}
