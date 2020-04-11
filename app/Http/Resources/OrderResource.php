<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'is_insured'=> $this->is_insured,
            'action'=> $this->action,
            'delivering_address'=> $this-> delivering_address,
            'total_Price'=> $this->total_Price,
            'user_id'=> new UserResource($this->user),
        ];
    }
}
