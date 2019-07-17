<?php

namespace App\Domain\Order\Commands;

use App\Http\Requests\Request;
use App\Order;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateOrderCommand
 * @package App\Domain\Order\Commands
 */
class CreateOrderCommand
{
    use DispatchesJobs;

    private $request;

    /**
     * CreateOrderCommand constructor.
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
        $order = new Order();
        $order->fill($this->request->all());

        return $order->save();
    }

}
