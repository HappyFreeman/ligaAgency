<?php

namespace App\Listeners;

use App\Events\ProductCreatedEvent;
use App\Mail\NewProductCreatedMail;
use Illuminate\Support\Facades\Mail;

class SendMailOnNewProductCreatedListener // слушатель на событие создание новой
{ // php artisan make:listener SendMailOnNewProductCreatedListener

    /**
     * Handle the event.
     */
    public function handle(ProductCreatedEvent $event): void
    {
        // MAIL_FROM_ADDRESS .env | key mail.from.address
        // config/mail.php address => env('MAIL_FROM_ADDRESS', 'hello@example.com')
        if ($email = config('products.email')) {
            Mail::to(config($email))->send(new NewProductCreatedMail($event->product()));
        }
    }
}
