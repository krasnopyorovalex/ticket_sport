<?php

namespace App\Domain\Order\Queries;

use App\Order;

/**
 * Class GetAllOrdersQuery
 * @package App\Domain\Order\Queries
 */
class GetAllOrdersQuery
{
    /**
     * Execute the job.
     */
    public function handle()
    {
        return Order::all();
    }
}
