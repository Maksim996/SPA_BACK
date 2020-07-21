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

    // protected $casts = [
    //     'birthday' => 'date:Y-m-d',
    // ];

    /**
     * Get user's full name
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->second_name} {$this->first_name} {$this->patronymic}";
    }
}
