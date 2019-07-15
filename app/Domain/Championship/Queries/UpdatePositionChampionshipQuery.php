<?php

namespace App\Domain\Championship\Queries;

use App\Championship;

/**
 * Class UpdatePositionChampionshipQuery
 * @package App\Domain\Championship\Queries
 */
class UpdatePositionChampionshipQuery
{
    /**
     * @var array
     */
    private $data;

    /**
     * UpdatePositionChampionshipQuery constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->data as $position => $id) {
            Championship::where('id', $id)->update(['pos' => $position]);
        }
    }
}
