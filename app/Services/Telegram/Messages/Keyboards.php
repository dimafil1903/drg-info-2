<?php

namespace App\Services\Telegram\Messages;

use JetBrains\PhpStorm\ArrayShape;

class Keyboards
{
    #[ArrayShape(['text' => "", 'reply_markup' => "bool[]"])]
    static public function clearKeyboard($text): array
    {
        return [
            'text' => $text,
            'reply_markup' => [
                'remove_keyboard' => true
            ]
        ];
    }

    #[ArrayShape(['text' => "", 'reply_markup' => "bool[]"])]
    static public function phoneKeyboard(): array
    {
        return
            [
                [
                    [
                        'text' => 'Поділитися номером телефона',
                        'request_contact' => 'true',
                    ]
                ]
            ];
    }
}
