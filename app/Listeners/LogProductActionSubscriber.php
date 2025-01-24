<?php

namespace App\Listeners;

use App\Contracts\Events\ProductActionEventContract;
use App\Events\ProductCreatedEvent;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

// php artisan make:listener  --event=ProductCreatedEvent
//LogProductCreatedListener -> LogProductActionSubscriber
class LogProductActionSubscriber
{ 
    private function log(string $message, ProductActionEventContract $event): void
    {
        // config/logging.php добавить productsInfo в channels
        Log::channel('productsInfo')->info($message, ['product' => $event->product()->toArray()]);
    }

    public function created(ProductCreatedEvent $event): void
    {
        $this->log('New product created', $event);
    }

    public function subscribe(Dispatcher $events): array
    {
        return [
            ProductCreatedEvent::class => 'created',
            //ProductUpdatedEvent::class => 'updated',
            //ProductDeletedEvent::class => 'deleted',
        ];
            
    }

    /**
     * Handle the event.
     */
    /*
    public function handle(ProductCreatedEvent $event): void
    {
        Log::channel('productsInfo')->info('New product created', ['product' => $event->product->toArray()]);
    }
    */
}
