<?php

namespace App\Domain\Match\Queries;

use App\Match;

/**
 * Class GetMatchByIdQuery
 * @package App\Domain\Match\Queries
 */
class GetMatchByIdQuery
{
    /**
     * @var int
     */
    private $id;

    /**
     * GetMatchByIdQuery constructor.
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
        return Match::with(['matchPlaces' => static function ($query) {
            return $query->with(['stadiumPlace']);
        }])->findOrFail($this->id);
    }
}
