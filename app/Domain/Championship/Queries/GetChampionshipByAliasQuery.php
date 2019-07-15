<?php

namespace App\Domain\Championship\Queries;

use App\Championship;

/**
 * Class GetChampionshipByAliasQuery
 * @package App\Domain\Championship\Queries
 */
class GetChampionshipByAliasQuery
{
    /**
     * @var string
     */
    private $alias;

    /**
     * GetChampionshipByAliasQuery constructor.
     * @param string $alias
     */
    public function __construct(string $alias)
    {
        $this->alias = $alias;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        return Championship::where('alias', $this->alias)->where('is_published', '1')->firstOrFail();
    }
}
