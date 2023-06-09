<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'cellphone' => $this->cellphone,
            'email' => $this->email,
            'orders' => OrderResource::collection($this->whenLoaded('orders',function (){
                return $this->orders->load('orders_item');
    })),

        ];
    }
    public function logout(){

    }
}
