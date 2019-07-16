<?php

namespace App\Domain\Stage\Queries;

use App\Stage;

/**
 * Class UpdatePositionStageQuery
 * @package App\Domain\Stage\Queries
 */
class UpdatePositionStageQuery
{
    /**
     * @var array
     */
    private $data;

    /**
     * UpdatePositionStageQuery constructor.
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
            Stage::where('id', $id)->update(['pos' => $position]);
        }
    }
}
