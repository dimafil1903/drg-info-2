<?php

namespace App\Services\Telegram\Commands;

use App\Models\DrgPeople;
use App\Services\Drg\SearchDrgService;
use App\Services\Telegram\TelegramDrgService;
use App\Services\Telegram\TelegramService;
use GuzzleHttp\Promise\Utils;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use JetBrains\PhpStorm\Pure;
use Ramsey\Collection\Collection;
use Throwable;
use WeStacks\TeleBot\Handlers\CommandHandler;
use WeStacks\TeleBot\Interfaces\UpdateHandler;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;
use Whoops\Handler\PlainTextHandler;

class TextHandler extends UpdateHandler
{
    use TelegramService, TelegramDrgService;

    /**
     * @throws Throwable
     */
    public function handle(): bool
    {

        if (!$this->checkIfRegister()) {
            return $this->answerNeedToRegister();
        }

        $this->sendWeWillFindSoon();

        $result = SearchDrgService::find($this->update->message->text);

        if (empty($result['drg_people'])) {
            $this->sendDrgPeopleNotFound();
        } else {
            $this->sendDrgPeopleInfo($result['drg_people']);
        }

        if (empty($result['cars'])) {
            $this->sendDrgCarsNotFound();
        } else {
            $this->sendDrgCarsInfo($result['cars']);
        }
        return true;
    }

    /**
     * @param Update $update
     * @param TeleBot $bot
     * @return bool
     */
    public static function trigger(Update $update, TeleBot $bot): bool
    {
        return
            (
                (isset($update->message->text) && !isset($update->message->entities))
                || (isset($update->message->entities[0]) && $update->message->entities[0]->type != 'bot_command')
            );
    }


}
