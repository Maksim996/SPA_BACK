<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Passport implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $length = strlen($value);
        if ($this->type == 0) {
            if ($length == 8) {
                $pattern = "/[^Є-ЯҐ]{0,2}\d{2,6}/";
                return preg_match($pattern, $value);
            }
            return false;
        }
        if ($this->type == 1) {
            if ($length == 9) {
                return ctype_digit($value);
            }
            return false;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        if ($this->type) {
            return trans('validation.custom.id-card');
        }
        return trans('validation.custom.passport');
    }
}
