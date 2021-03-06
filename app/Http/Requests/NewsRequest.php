<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    public function authorize()
    {
        return true; // 不須額外驗證，直接通過
    }

    public function rules()
    {
        return [
            'title' => 'required|max:30',
            'article' => 'required|max:1000',
            'image_path' => 'mimes:jpg,jpeg,bmp,png|max:2048',
            ];
    }

    public function attributes()
    {
        return [
            'article' => '內文',
        ];
    }
}
