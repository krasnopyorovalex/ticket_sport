<?php

namespace App\Http\Controllers;

use App\Domain\Order\Commands\CreateOrderCommand;
use App\Http\Requests\Forms\OrderRequest;
use App\Mail\OrderSent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{
    use DispatchesJobs;

    private $to = 'book@ticket-sport.ru';

    /**
     * @param OrderRequest $request
     * @return array
     */
    public function order(OrderRequest $request): array
    {
        Mail::to([$this->to])->send(new OrderSent($request->all()));

        $this->dispatch(new CreateOrderCommand($request->all()));

        return [
            'message' => 'Благодарим за Вашу заявку. Мы свяжемся с Вами в ближайшее время',
            'status' => 200
        ];
    }
}
