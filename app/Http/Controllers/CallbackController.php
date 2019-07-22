<?php

namespace App\Http\Controllers;

use App\Http\Requests\Forms\CallbackRequest;

use App\Mail\CallbackSent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CallbackController
 * @package App\Http\Controllers
 */
class CallbackController extends Controller
{
    use DispatchesJobs;

    private $to = 'djShtaket88@mail.ru';

    /**
     * @param CallbackRequest $request
     * @return array
     */
    public function callback(CallbackRequest $request): array
    {
        Mail::to([$this->to])->send(new CallbackSent($request->all()));

        return [
            'message' => 'Благодарим за Вашу заявку. Мы свяжемся с Вами в ближайшее время',
            'status' => 200
        ];
    }
}
