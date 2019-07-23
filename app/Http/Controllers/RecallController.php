<?php

namespace App\Http\Controllers;

use App\Http\Requests\Forms\RecallRequest;

use App\Mail\RecallSent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class RecallController
 * @package App\Http\Controllers
 */
class RecallController extends Controller
{
    use DispatchesJobs;

    private $to = 'djShtaket88@mail.ru';

    /**
     * @param RecallRequest $request
     * @return array
     */
    public function recall(RecallRequest $request): array
    {
        Mail::to([$this->to])->send(new RecallSent($request->all()));

        return [
            'message' => 'Благодарим за Вашу заявку. Мы свяжемся с Вами в ближайшее время',
            'status' => 200
        ];
    }
}
