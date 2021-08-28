<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        /* 遇到關聯的資料 有嵌套關係 且每次都需要叫出關聯的資料時時   */

        /* 方法1 官方寫的解法
           將需要的欄位一個個寫進來 包含被關聯的部分
           注意呼叫關聯的資料內容的部分*/
        // return [
        //     'id' => $this->id,
        //     'name' => $this->name,
        //     'birthday' => $this->birthday,
        //     'phone_no' => $this->phone_no,
        //     'email' => $this->email,
        //     'recipients' => Recipient::collection($this->recipients),
        //     'orders' => Order::collection($this->orders),
        //     'created_at' => $this->created_at,
        //     'updated_at' => $this->updated_at,
        // ];

        /* 方法2
           在套用User model 的hidden 屬性後
           我沒有需要特別隱藏的欄位
           所以自己寫了一個 與方法1 等效 但較短的statement*/
        // $origin= parent::toArray($request);
        // $origin['recipients']=Recipient::collection($this->recipients);
        // $origin['orders']=Order::collection($this->orders);
        // return $origin;

        /* 方法3
           再重新一個 使用with
           並且從$request 決定要不要叫出關聯的資料*/
        $origin= parent::toArray($request);
        $origin['recipients']=Recipient::collection($this->whenLoaded('recipients'));
        $origin['orders']=Order::collection($this->whenLoaded('orders'));
        return $origin;
    }

    /* When the preserveKeys property is set to true, collection keys will be preserved. */
    // public $preserveKeys = true;
}
