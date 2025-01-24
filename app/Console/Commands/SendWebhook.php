<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SendWebhook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-webhook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Получаем продукт с самым высоким ID
        $product = Product::latest('id')->first();

        // URL вебхука из конфигурации
        $webhookUrl = config('products.webhook');

        // Отправляем POST-запрос
        $response = Http::post($webhookUrl, $product->toArray());

        

        return Command::SUCCESS;
    }
}
