<?php

namespace App\Domain\Order\Commands;

use App\Domain\Order\Queries\GetOrderByIdQuery;
use App\Http\Requests\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class UpdateOrderCommand
 * @package App\Domain\Order\Commands
 */
class UpdateOrderCommand
{

    use DispatchesJobs;

    private $request;
    private $id;

    /**
     * UpdateOrderCommand constructor.
     * @param int $id
     * @param Request $request
     */
    public function __construct(int $id, Request $request)
    {
        $this->id = $id;
        $this->request = $request;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $order = $this->dispatch(new GetOrderByIdQuery($this->id));

        return $order->update($this->request->all());
    }

}
