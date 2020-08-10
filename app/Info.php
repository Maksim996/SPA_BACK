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
        'type_passport',
        'passport',
        'inn_code',
        'sex',
        'image',
        'description'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'birthday' => 'date:Y-m-d',
    ];

    /**
     * Get user's full name
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->second_name} {$this->first_name} {$this->patronymic}";
    }

    /**
     * Get formatted date
     *
     * @return string;
     */
    public function getFormattedBirthdayAttribute() {
        return $this->birthday->format('d.m.Y');
    }

    // public function getBirthdayAttribute($value) {
    //     return $value;
    // }

    public function getPhoneAttribute($value)
    {
        return  '+' . $value;
    }
    /**
     * Get Formatted phone
     * +38(0##)-###-##-##
     * @return string;
     *
     */

    private function formattedPhone($phone) {
        return  "+" . $phone[0] . $phone[1] . "(" . $phone[2] . $phone[3] . $phone[4] .")";
    }
}
