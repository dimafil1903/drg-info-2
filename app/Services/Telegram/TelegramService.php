<?php

namespace App\Services\Telegram;

use App\Models\TelegramUser;
use App\Services\Telegram\Messages\Keyboards;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;

trait TelegramService
{

    public function checkIfRegister(): bool
    {
        return TelegramUser::where('user_id', $this->update->user()->id)->exists();
    }


    public function checkIfBanned(): bool
    {
        return TelegramUser::where('user_id', $this->update->user()->id)->where('enabled', false)->exists();
    }


    public function answerNeedToRegister(): bool
    {
        $this->sendMessage([
            'text' => 'Спочатку підтвердіть свій номер телефону!',
            'reply_markup' => [
                'keyboard' => Keyboards::phoneKeyboard()
            ]
        ]);
        return true;
    }

    public function answerThatBanned(): bool
    {
        $this->sendMessage([
            'text' => 'Схоже ви більше не можете користуватися ботом, бо ви в бані!',
            'reply_markup' => [
                'remove_keyboard' => true
            ],
        ]);
        return true;
    }
    public function createTgUser()
    {
        TelegramUser::create([
            'user_id' => $this->update->user()->id,
            'first_name' => $this->update->user()->first_name ?? null,
            'last_name' => $this->update->user()->last_name ?? null,
            'phone' => $this->update->message->contact->phone_number,
            'username' => $this->update->user()->username ?? null,
        ]);
    }

    public function sendNothingFound()
    {
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
