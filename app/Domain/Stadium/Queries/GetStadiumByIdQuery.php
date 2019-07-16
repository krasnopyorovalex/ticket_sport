<?php

namespace App\Domain\Stadium\Queries;

use App\Stadium;

/**
 * Class GetStadiumByIdQuery
 * @package App\Domain\Stadium\Queries
 */
class GetStadiumByIdQuery
{
    /**
     * @var int
     */
    private $id;

    /**
     * GetStadiumByIdQuery constructor.
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
        return Stadium::with(['image'])->findOrFail($this->id);
    }
}
