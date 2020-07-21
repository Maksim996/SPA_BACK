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
            'email' => $this->email,
            'first_name' => $this->info->first_name,
            'second_name' => $this->info->second_name,
            'patronymic' => $this->info->patronymic,
            'birthday' => Carbon::CreateFromFormat('Y-m-d', $this->info->birthday)->format('d.m.Y'),
            'phone' => $this->info->phone,
            'additional_phone' => $this->info->additional_phone,
            'passport' => $this->info->passport,
            'inn_code' => $this->info->inn_code,
            'sex' => $this->info->sex,
            'image' => $this->info->image,
        ];
    }
}
