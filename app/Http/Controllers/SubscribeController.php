<?php

namespace App\Http\Controllers;

use App\Http\Requests\Forms\SubscribeRequest;
use App\Mail\SubscribeSent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class SubscribeController
 * @package App\Http\Controllers
 */
class SubscribeController extends Controller
{
    use DispatchesJobs;

    private $to = 'djShtaket88@mail.ru';

    /**
     * @param SubscribeRequest $request
     * @return array
     */
    public function subscribe(SubscribeRequest $request): array
    {
        Mail::to([$this->to])->send(new SubscribeSent($request->all()));

        return [
            'message' => 'Благодарим за Вашу заявку. Мы свяжемся с Вами в ближайшее время',
            'status' => 200
        ];
    }
}
