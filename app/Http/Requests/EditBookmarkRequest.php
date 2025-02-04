<?php

namespace App\Http\Requests;

use Dotenv\Util\Regex;
use Illuminate\Foundation\Http\FormRequest;

class EditBookmarkRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */



    public function rules(): array
    {
        return [
            'color' => 'string|max:25',
            'link' => 'string',
        ];
    }
}
