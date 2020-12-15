<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SignupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            "id" => $this->id,
            "fullname" => $this->fullname,
            "email" => $this->email,
            "phone" => $this->phone,
            "company" => $this->company,
            "paystatus" => $this->paystatus,
            "ticked_id" => $this->ticked_id,
            "tchrono" => $this->tchrono,
            "presence" => $this->signup_status_summit->presence
        ];
    }
}
