<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_info';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'second_name',
        'patronymic',
        'birthday',
        'phone',
        'additional_phone',
        'passport',
        'inn_code',
        'sex',
        'image',
        'description'
    ];
}
