<?php

namespace App\Services\Telegram\Commands;

use GuzzleHttp\Promise\Utils;
use Illuminate\Support\Facades\Log;
use JetBrains\PhpStorm\Pure;
use Throwable;
use WeStacks\TeleBot\Handlers\CommandHandler;
use WeStacks\TeleBot\Interfaces\UpdateHandler;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;
use Whoops\Handler\PlainTextHandler;

class TextHandler extends UpdateHandler
{
    /**
     * @throws Throwable
     */
    public function handle()
    {

        $this->sendMessage([
            'text' => 'Зараз перевіримо!',
            'reply_markup' => [
                'remove_keyboard' => true
            ]
        ]);



    }

    #[Pure] public static function trigger(Update $update, TeleBot $bot): bool
    {
        return (isset($update->message->text) && !isset($update->message->entities))
            || (isset($update->message->entities[0]) && $update->message->entities[0]->type != 'bot_command');
    }
}
