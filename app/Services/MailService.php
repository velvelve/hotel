<?php

namespace App\Services;

use App\Mail\BookingConfirmation;
use App\Mail\ContactMessage;
use App\Models\Booking;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function sentToAdmin(array $data)
    {
        try {
            //Указываем почту админа
            Mail::to('hello@example.com')->send(new ContactMessage($data));
            return true;
        } catch (\Exception $e) {
            throw new \Exception('Ошибка при отправке сообщения: ' . $e->getMessage());
        }
    }

    public function sendConfirmation(Booking $booking)
    {
        try {
            //Получаем из booking почту
            $client_email = $booking->client_email;

            Mail::to($client_email)->send(new BookingConfirmation($booking));
            return true;
        } catch (\Exception $e) {
            throw new \Exception('Ошибка при отправке письма: ' . $e->getMessage());
        }
    }
}
