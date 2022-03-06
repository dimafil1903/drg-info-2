<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class StoreDrgCarRequest extends FormRequest
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
    #[ArrayShape(['left_letters' => "string[]", 'number' => "string[]", 'right_letters' => "string[]", 'description' => "string[]", 'photo' => "string[]"])] public function rules()
    {
        return [
            'left_letters' => ['nullable', 'string'],
            'number' => ['nullable', 'required', 'string'],
            'right_letters' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'photo' => ['nullable', 'image'],
        ];
    }
}
