<?php

namespace App\Services\Telegram\Commands;

use App\Services\Telegram\Messages\StaticHelper;
use App\Services\Telegram\TelegramService;
use GuzzleHttp\Promise\Utils;
use Illuminate\Support\Facades\Log;
use JetBrains\PhpStorm\Pure;
use App\Services\Telegram\Messages\Keyboards;
use Throwable;
use WeStacks\TeleBot\Interfaces\UpdateHandler;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;

class GetPhoneHandler extends UpdateHandler
{
    use TelegramService;

    /**
     * @throws Throwable
     */
    public function handle()
    {


        if (!$this->checkIfRegister()) {
            $this->createTgUser();
        }
        $this->sendMessage(Keyboards::clearKeyboard('Героям слава!'));

        $this->sendMessage([
            'text' => StaticHelper::$helperMessage,
            'reply_markup' => [
                'remove_keyboard' => true
            ]
        ]);

    }

    #[Pure] public static function trigger(Update $update, TeleBot $bot): bool
    {
        return isset($update->message->contact) && ($update->message->contact->user_id === $update->user()->id);
    }
}
