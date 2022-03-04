<?php

namespace App\Services\Telegram\Commands;

use App\Models\DrgPeople;
use App\Services\Drg\SearchDrgService;
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

        $result = SearchDrgService::find($this->update->message->text);


        /**
         * @var $item DrgPeople
         */
        foreach ($result['drg_people'] as $item) {
            $phones = json_decode($item->phones);
            $str_phones = implode(' ; ', (array)$phones);
            $text = "Ім'я (ru): $item->name_ru,\n" .
                "Ім'я (lt): $item->name_lt,\n" .
                "Паспорт: $item->passport,\n" .
                "Дата народження: $item->date_of_birthday,\n" .
                "Адреса: $item->address,\n" .
                "Телефони: $str_phones,\n
             ";

            if ($item->photo){
                $text.="<a href='" . asset($item->photo)."'> ‏ </a>";
            }

            $this->sendMessage([
                'text' => $text,
                'reply_markup' => [
                    'remove_keyboard' => true
                ],
                'parse_mode' => 'HTML',
                'disable_web_page_preview' => false,
            ]);
        }
        if (empty($result['drg_people'])){
            $this->sendMessage([
                'text' => "Нажаль, нічого не знайдено",
                'reply_markup' => [
                    'remove_keyboard' => true
                ],
                'parse_mode' => 'HTML',
                'disable_web_page_preview' => false,
            ]);
        }

    }

    #[Pure] public static function trigger(Update $update, TeleBot $bot): bool
    {
        return (isset($update->message->text) && !isset($update->message->entities))
            || (isset($update->message->entities[0]) && $update->message->entities[0]->type != 'bot_command');
    }
}
