<?php

namespace App\Domain\Stadium\Queries;

use App\Stadium;

/**
 * Class UpdatePositionStadiumQuery
 * @package App\Domain\Stadium\Queries
 */
class UpdatePositionStadiumQuery
{
    /**
     * @var array
     */
    private $data;

    /**
     * UpdatePositionStadiumQuery constructor.
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
            Stadium::where('id', $id)->update(['pos' => $position]);
        }
    }
}
