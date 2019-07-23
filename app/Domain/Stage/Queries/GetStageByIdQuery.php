<?php

namespace App\Domain\Stage\Queries;

use App\Stage;

/**
 * Class GetStageByIdQuery
 * @package App\Domain\Stage\Queries
 */
class GetStageByIdQuery
{
    /**
     * @var int
     */
    private $id;

    /**
     * GetStageByIdQuery constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return Stage::with(['matches' => static function($query) {
            return $query->active();
        }])->findOrFail($this->id);
    }
}
