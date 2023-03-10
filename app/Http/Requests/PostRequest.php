<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['string', 'max:255', 'required'],
            'category' => ['string', 'max:30', 'required'],
            'body' => ['string', 'max:1000', 'required'],
        ];
    }

}
