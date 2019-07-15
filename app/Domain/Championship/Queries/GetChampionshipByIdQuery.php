<?php

namespace App\Domain\Championship\Queries;

use App\Championship;

/**
 * Class GetChampionshipByIdQuery
 * @package App\Domain\Championship\Queries
 */
class GetChampionshipByIdQuery
{
    /**
     * @var int
     */
    private $id;

    /**
     * GetChampionshipByIdQuery constructor.
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
        return Championship::with(['image'])->findOrFail($this->id);
    }
}
