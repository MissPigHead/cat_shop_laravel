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
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'recipients' => Recipient::collection($this->recipients),
            'orders' => Order::collection($this->orders),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    public $preserveKeys = true; // When the preserveKeys property is set to true, collection keys will be preserved.
}
