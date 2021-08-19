<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->method() == 'POST') {
            return [
                'image' => 'bail|required|mimes:jpg,jpeg,bmp,png|max:2048',
                'text' => 'max:20',
            ];
        } else {
            return [
                'text' => 'max:20',
            ];
        }
    }

    public function attributes()
    {
        return [
            'text' => '備註文字',
        ];
    }
}
