<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;
use Kdion4891\LaravelLivewireTables\Column;

class StoreDrgPeopleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    #[ArrayShape(['name_ru' => "string[]", 'name_lt' => "string[]", 'date_of_birthday' => "string[]", 'passport' => "string[]", 'passport_id' => "string[]", 'address' => "string[]", 'phones' => "string[]", 'photo' => "string[]"])]
    public function rules(): array
    {
        return [
            'name_ru' => ['nullable', 'string'],
            'name_lt' => ['nullable', 'string'],
            'date_of_birthday' => ['nullable', 'string'],
            'passport' => ['nullable', 'string'],
            'passport_id' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'phones' => ['required','array'],
            'photo' => ['nullable', 'image'],
        ];
    }
}
