<?php

namespace App\Domain\Match\Commands;

use App\Domain\MatchPlace\Commands\CreateMatchPlaceCommand;
use App\Http\Requests\Request;
use App\Match;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateMatchCommand
 * @package App\Domain\Match\Commands
 */
class CreateMatchCommand
{
    use DispatchesJobs;

    private $request;

    /**
     * CreateMatchCommand constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $match = new Match();
        $match->fill($this->request->all());
        $match->save();

        $this->syncPlaces($match);

        return true;
    }

    /**
     * synchronize places for match
     *
     * @param Match $match
     */
    private function syncPlaces(Match $match): void
    {
        $places = $this->request->post('places');

        if ($places) {
            foreach ($places as $stadiumPlaceId => $price) {
                $data = [
                    'match_id' => $match->id,
                    'stadium_place_id' => (int)$stadiumPlaceId,
                    'price' => $price
                ];
                $this->dispatch(new CreateMatchPlaceCommand($data));
            }
        }
    }

}
