<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // 不須額外驗證，直接通過
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:20',
            'article' => 'required|max:1000',
            'image' => 'mimes:jpg,jpeg,bmp,png|max:2048',
            ];
    }


    public function messages() // 要使用自定義回應就加function message()，否則error message就會是預設回應內容
    {
        return [
            'title.required' => '標題不得為空白',
            'title.max' => '標題最多20個字',
            'article.required' => '文章內容不得為空白',
            'article.max' => '文章最多1000個字',
            'image.mimes' => '請使用 jpg, jpeg, bmp, png 圖片',
            'image.max' => '圖片尺寸需在2MB以下'
        ];
    }
}
