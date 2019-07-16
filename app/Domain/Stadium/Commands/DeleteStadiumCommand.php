<?php

namespace App\Domain\Stadium\Commands;

use App\Domain\Image\Commands\DeleteImageCommand;
use App\Domain\Stadium\Queries\GetStadiumByIdQuery;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class DeleteStadiumCommand
 * @package App\Domain\Stadium\Commands
 */
class DeleteStadiumCommand
{

    use DispatchesJobs;

    /**
     * @var int
     */
    private $id;

    /**
     * DeleteStadiumCommand constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(): bool
    {
        $stadium = $this->dispatch(new GetStadiumByIdQuery($this->id));

        if ($stadium->image) {
            $this->dispatch(new DeleteImageCommand($stadium->image));
        }

        return $stadium->delete();
    }

}
