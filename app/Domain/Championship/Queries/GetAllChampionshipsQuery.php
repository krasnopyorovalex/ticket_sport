<?php

namespace App\Domain\Championship\Queries;

use App\Championship;

/**
 * Class GetAllChampionshipsQuery
 * @package App\Domain\Championship\Queries
 */
class GetAllChampionshipsQuery
{
    /**
     * Execute the job.
     */
    public function handle()
    {
        return Championship::orderBy('pos')->get();
    }
}
