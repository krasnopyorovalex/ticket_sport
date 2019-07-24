<?php

namespace App\Domain\Championship\Queries;

use App\Championship;

/**
 * Class GetChampionshipByNameQuery
 * @package App\Domain\Championship\Queries
 */
class GetChampionshipByNameQuery
{
    /**
     * @var string
     */
    private $keyword;

    /**
     * GetChampionshipByNameQuery constructor.
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
        return Championship::where('name', 'like', '%' . $this->keyword . '%')
            ->first();
    }
}
