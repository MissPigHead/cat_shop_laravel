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
        return [
            'image' => 'bail|required|mimes:jpg,jpeg,bmp,png|max:2048',
            'text' => 'max:20',
            ];
    }


    public function messages() // 要使用自定義回應就加function message()，否則error message就使用官方預設回應內容
    {
        return [
            'title.max' => '備註文字最多20個字',
            'image.required' => '請上傳Banner圖片',
            'image.mimes' => '請使用 jpg, jpeg, bmp, png 圖片',
            'image.max' => '圖片尺寸需在2MB以下'
        ];
    }
}
