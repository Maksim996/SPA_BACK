<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class UserResource extends JsonResource
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
            'role_id' => $this->role_id,
            'email' => $this->email,
            'first_name' => $this->info->first_name,
            'second_name' => $this->info->second_name,
            'patronymic' => $this->info->patronymic,
            'birthday' => $this->info->birthday,
            'phone' => $this->info->phone,
            'phone_format' => $this->info->phoneFormat,
            'phone_national' => $this->info->phoneNational,
            'additional_phone' => $this->info->additional_phone,
            'additional_phone_format' => $this->info->additionalPhoneFormat,
            'passport' => $this->info->passport,
            'inn_code' => $this->info->inn_code,
            'sex' => $this->info->sex,
            'image' => $this->info->image,
            'background_url' => $this->info->background_url,
            'description' => $this->info->description,
        ];
    }
}
