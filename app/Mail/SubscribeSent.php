<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class SubscribeSent
 * @package App\Mail
 */
class SubscribeSent extends Mailable
{
    use Queueable, SerializesModels;

    private $data;

    /**
     * OrderServiceSent constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return SubscribeSent
     */
    public function build(): SubscribeSent
    {
        return $this->from('bilety.sport@yandex.ru')
            ->subject('Форма: Подписаться')
            ->view('emails.subscribe', [
                'data' => $this->data
            ]);
    }
}
