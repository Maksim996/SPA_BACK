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
        'background_url',
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
    public function getFormattedBirthdayAttribute() :string
    {
        return $this->birthday->format('d.m.Y');
    }

    /**
     * Get short phone number
     *
     * @return string
     */
    public function getShortPhoneAttribute() :string
    {
        return substr($this->phone, 3);
    }
    /**
     * Get phone in format +38(0##) ### ## ##
     *
     * @return string
     */
    public function getPhoneFormatAttribute()
    {
        return self::formattedPhone($this->phone);
    }

    public function getShortAdditionalPhoneAttribute()
    {
        if ($this->attributes['additional_phone']) {
            return substr($this->attributes['additional_phone'], 3);
        }
        return;
    }
    /**
     * Get additional phone in format +38(0##) ### ## ##
     *
     * @return string
     */
    public function getAdditionalPhoneFormatAttribute()
    {
        return self::formattedPhone($this->attributes['additional_phone']);
    }
    /**
     * Formatted phone mask +38(0##) ### ## ##
     *
     * @param $phone string
     * @return string;
     */

    private static function formattedPhone($phone)
    {
        if ($phone && strlen($phone) === 12) {
            $half = str_split($phone, 5);
            $firstHalf = str_split($half[0], 2);

            $codeWithOperator = "+$firstHalf[0] ($firstHalf[1]$firstHalf[2])";
            $phone = str_split($half[1], 3);
            $formatePhone = [
                $codeWithOperator,
                $phone[0],
                $phone[1],
                $half[2]
            ];

            return implode(' ', $formatePhone);
        }
        return $phone;
    }
}
