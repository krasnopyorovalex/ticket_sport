<?php


namespace App\Domain\MatchPlace\Queries;


use App\MatchPlace;

/**
 * Class GetMatchPlaceByIdQuery
 * @package App\Domain\MatchPlace\Queries
 */
class GetMatchPlaceByIdQuery
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
        return MatchPlace::findOrFail($this->id);
    }
}
