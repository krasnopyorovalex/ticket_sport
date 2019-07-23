<?php

namespace App\Domain\MatchPlace\Commands;

use App\MatchPlace;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateMatchPlaceCommand
 * @package App\Domain\MatchPlace\Commands
 */
class CreateMatchPlaceCommand
{
    use DispatchesJobs;

    private $data;

    /**
     * CreateMatchPlaceCommand constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $matchPlace = new MatchPlace();
        $matchPlace->fill($this->data);

        return $matchPlace->save();
    }

}
