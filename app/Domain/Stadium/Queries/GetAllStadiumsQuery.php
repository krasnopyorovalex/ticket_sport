<?php

namespace App\Domain\Stadium\Queries;

use App\Stadium;

/**
 * Class GetAllStadiumsQuery
 * @package App\Domain\Stadium\Queries
 */
class GetAllStadiumsQuery
{
    /**
     * Execute the job.
     */
    public function handle()
    {
        return Stadium::all();
    }
}
