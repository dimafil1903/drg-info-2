<?php

namespace App\Services\Telegram;

use App\Models\TelegramUser;
use App\Services\Telegram\Messages\Keyboards;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;

trait TelegramDrgService
{

    public function sendWeWillFindSoon(){
        $this->sendMessage([
            'text' => 'Зараз перевіримо!',
            'reply_markup' => [
                'remove_keyboard' => true
            ]
        ]);
    }
    public function sendDrgPeopleInfo($drg_people){
        foreach ($drg_people as $item) {
            $phones = json_decode($item['phones']);
            $str_phones = implode(' ; ', (array)$phones);
            $text = "Ім'я (ru): " . $item['name_ru'] . ",\n" .
                "Ім'я (lt):" . $item['name_lt'] . ",\n" .
                "Паспорт:" . $item['passport'] . ",\n" .
                "Дата народження: " . $item['date_of_birthday'] . ",\n" .
                "Адреса: " . $item['address'] . ",\n" .
                "Телефони: " . $str_phones . ",\n
             ";

            if ($item['photo']) {
                $this->sendPhoto([
                    'photo' => asset($item['photo']),
                    'caption' => $text,

                    'reply_markup' => [
                        'remove_keyboard' => true
                    ],
                ]);
            } else {
                $this->sendMessage([
                    'text' => $text,
                    'reply_markup' => [
                        'remove_keyboard' => true
                    ],
                    'parse_mode' => 'HTML',
                    'disable_web_page_preview' => false,
                ]);
            }
        }
    }


    public function sendDrgCarsInfo($drg_cars){
      //TODO
    }
    public function sendDrgPeopleNotFound(){
        $this->sendMessage([
            'text' => 'Інформації по "людям" не знайдено!',
            'reply_markup' => [
                'remove_keyboard' => true
            ]
        ]);
    }
    public function sendDrgCarsNotFound(){
        $this->sendMessage([
            'text' => 'Інформації по автомобілям не знайдено!',
            'reply_markup' => [
                'remove_keyboard' => true
            ]
        ]);
    }




}
