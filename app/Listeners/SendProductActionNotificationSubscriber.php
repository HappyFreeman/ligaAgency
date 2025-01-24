<?php

namespace App\Listeners;

use App\Contracts\Events\ProductActionEventContract;
use App\Events\ProductCreatedEvent;
use App\Notifications\MyProductActionNotification;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;


class SendProductActionNotificationSubscriber // Слушатель событя
{

    private function notify(string $action, ProductActionEventContract $event): void
    {
        /** @var User $user */
        $user = Auth::user();
        if (! $user) {
            return;
        }

        $user->notify(new MyProductActionNotification($event->product(), $action));
    }

    public function created(ProductCreatedEvent $event): void
    {
        $this->notify('создана', $event);
    }

    public function subscribe(Dispatcher $events): array
    {
        return [
            ProductCreatedEvent::class => 'created',
        ];
            
    }
}