<?php

namespace App\Http\Resources;
use App\Order;
use App\UserAddresses;


use Illuminate\Http\Resources\Json\JsonResource;

class UserOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'=> $this->id,
            'image'=> $this->image,
            'order_id'=> new OrderResource($this->order),
            'user_address_id'=> new UserAddressesResource($this->user_address),
        ];
    }
}

