<?php

namespace App\Domain\Stadium\Queries;

use App\Stadium;

/**
 * Class GetStadiumByNameQuery
 * @package App\Domain\Stadium\Queries
 */
class GetStadiumByNameQuery
{
    /**
     * @var string
     */
    private $keyword;

    /**
     * GetStadiumByNameQuery constructor.
     * @param string $keyword
     */
    public function __construct(string $keyword)
    {
        $this->keyword = $keyword;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return Stadium::where('name', 'like', '%' . $this->keyword . '%')
            ->with(['matches'])
            ->first();
    }
}
