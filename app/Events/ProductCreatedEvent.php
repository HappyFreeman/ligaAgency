<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductCreatedEvent extends AbstractProductActionEvent // Класс события
{ // php artisan make:event ProductCreatedEvent
    use Dispatchable;
    //use Dispatchable, InteractsWithSockets, SerializesModels;
}
