<?php

namespace App\Domain\Stage\Queries;

use App\Stage;

/**
 * Class GetStageByIdWithTeamQuery
 * @package App\Domain\Stage\Queries
 */
class GetStageByIdWithTeamQuery
{
    /**
     * @var int
     */
    private $stage;
    /**
     * @var int
     */
    private $team;

    /**
     * GetStageByIdWithTeamQuery constructor.
     * @param int $stage
     * @param int $team
     */
    public function __construct(int $stage, int $team)
    {
        $this->stage = $stage;
        $this->team = $team;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $team = $this->team;

        return Stage::with(['matches' => static function($query) use ($team) {
            return $query
                ->active()
                ->when($team, static function ($query) use ($team) {
                    return $query->where(static function ($query) use ($team) {
                        return $query->where('team_first_id', $team)
                            ->orWhere('team_second_id', $team);
                    });
                });
        }])->findOrFail($this->stage);
    }
}
