<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Category extends JsonResource
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
        $request['parent_name']=$this->parent_name;
        // $request['parent_name']=Category::collection($this->parent_name);
        // $request['parent_name']=new Category($this->parent_name);
        return $request;
    }
}
