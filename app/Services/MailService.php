<?php

namespace App\Services;

use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function send(array $data)
    {
        try {
            Mail::to('hello@example.com')->send(new ContactMessage($data));
            return true;
        } catch (\Exception $e) {
            throw new \Exception('Ошибка при отправке сообщения: ' . $e->getMessage());
        }
    }
}
