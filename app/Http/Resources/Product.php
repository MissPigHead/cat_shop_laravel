<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $request= parent::toArray($request);
        $request['category']=new Category($this->whenLoaded('category'));
        // $request['category']=new Category($this->category);
        // $request['category']=Category::collection($this->whenLoaded('category'));
        return $request;
    }
}
