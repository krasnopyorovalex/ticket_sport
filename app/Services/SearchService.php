<?php

namespace App\Services;


use App\Domain\Championship\Queries\GetChampionshipByNameQuery;
use App\Domain\Stadium\Queries\GetStadiumByNameQuery;
use App\Domain\Team\Queries\GetTeamByNameQuery;
use Illuminate\Foundation\Bus\DispatchesJobs;


/**
 * Class SearchService
 * @package App\Services
 */
class SearchService
{
    use DispatchesJobs;

    /**
     * @var array
     */
    protected $matches = [];

    /**
     * @param string $keyword
     * @return mixed
     */
    public function search(string $keyword)
    {
        $teamMatches = $this->dispatch(new GetTeamByNameQuery($keyword));
        $stadiumMatches = $this->dispatch(new GetStadiumByNameQuery($keyword));
        $championshipMatches = $this->dispatch(new GetChampionshipByNameQuery($keyword));

        if ($teamMatches) {
            $this->matches = $teamMatches->matchesFirst->merge($teamMatches->matchesSecond);
        } elseif ($stadiumMatches) {
            $this->matches = $stadiumMatches->matches;
        } elseif ($championshipMatches && $championshipMatches->matches) {
            $this->matches = $championshipMatches->matches;
        }

        return $this->matches;
    }
}
