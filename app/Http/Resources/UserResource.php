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
            'phone' => $this->info->shortPhone,
            'phone_format' => $this->info->phoneFormat,
            'additional_phone' => $this->info->shortAdditionalPhone,
            'additional_phone_format' => $this->info->additionalPhoneFormat,
            'type_passport' => $this->info->type_passport,
            'passport' => $this->info->passport,
            'inn_code' => $this->info->inn_code,
            'sex' => $this->info->sex,
            'image' => $this->info->image,
            'background_url' => $this->info->background_url,
            'description' => $this->info->description,
        ];
    }
}
