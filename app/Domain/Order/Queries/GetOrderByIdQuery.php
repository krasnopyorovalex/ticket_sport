<?php

namespace App\Domain\Order\Queries;

use App\Order;

/**
 * Class GetOrderByIdQuery
 * @package App\Domain\Order\Queries
 */
class GetOrderByIdQuery
{
    /**
     * @var int
     */
    private $id;

    /**
     * GetOrderByIdQuery constructor.
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
        return Order::findOrFail($this->id);
    }
}
