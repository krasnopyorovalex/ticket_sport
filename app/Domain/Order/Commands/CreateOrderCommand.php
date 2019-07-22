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

    private $data;

    /**
     * CreateOrderCommand constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return bool
     */
    public function handle(): bool
    {
        $order = new Order();
        $order->match = $this->data['match'];
        $order->body = view('emails.order', ['data' => $this->data]);
        $order->created_at = date('Y-m-d H:i:s');

        return $order->save();
    }

}
