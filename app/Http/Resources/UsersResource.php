<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
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
            'email' => $this->email,
            'full_name' => $this->info->fullName,
            'phone' => $this->info->shortPhone,
            'phone_format' => $this->info->phoneFormat,
            'birthday' => $this->info->birthday,
        ];
    }
}
