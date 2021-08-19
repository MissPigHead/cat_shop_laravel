<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->method() == 'POST') {
            return [
                'title' => 'max:10',
                'parent' => 'required',
            ];
        } else {
            return [
                'title' => 'max:10',
            ];
        }
    }

    public function attributes()
    {
        return [
            'title' => '目錄名稱',
            'parent' => '上層主目錄',
        ];
    }
}
