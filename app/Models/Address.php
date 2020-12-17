<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the city for Address
     */
    public function cities () {
        return $this->hasMany('\App\City')->orderBy('city', 'asc');
    }

}
