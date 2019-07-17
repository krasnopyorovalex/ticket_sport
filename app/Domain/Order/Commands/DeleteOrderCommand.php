<?php

namespace App\Domain\Order\Commands;

use App\Domain\Order\Queries\GetOrderByIdQuery;
use App\Domain\Image\Commands\DeleteImageCommand;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class DeleteOrderCommand
 * @package App\Domain\Order\Commands
 */
class DeleteOrderCommand
{

    use DispatchesJobs;

    /**
     * @var int
     */
    private $id;

    /**
     * DeleteOrderCommand constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(): bool
    {
        $order = $this->dispatch(new GetOrderByIdQuery($this->id));

        return $order->delete();
    }

}
