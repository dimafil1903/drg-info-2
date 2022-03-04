<?php

namespace App\Services\Telegram\Commands;

use App\Services\Telegram\Messages\Keyboards;
use Illuminate\Support\Facades\Log;
use Throwable;
use WeStacks\TeleBot\Handlers\CommandHandler;

class StartCommand extends CommandHandler
{
    protected static $aliases = ['/start', '/s'];
    protected static $description = 'Send "/start" or "/s" to get "Hello, World!"';

    /**
     * @throws Throwable
     */
    public function handle()
    {


        Log::info("HI", (array)$this->getWebhookInfo());

        $this->sendMessage([
            'text' => 'Слава Україні!',
            'reply_markup' => [
                'keyboard' => Keyboards::phoneKeyboard()
            ]
        ]);
    }
}
