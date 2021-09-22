<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipientRequest extends FormRequest
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

    public function rules()
    {
        return [
            'user_id' => 'required',
            'name' => 'required|max:20',
            'phone_no' => ['size:10', 'regex:/^\d{10}$/'],
            'postcode_id' => 'required',
            'addr' => 'required|max:60',
            ];
    }

    public function attributes()
    {
        return [
            'postcode_id' => '城市及區域',
        ];
    }
}
