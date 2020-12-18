<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var [array]
     */
    protected $guarded = [];

    /**
     * Get the Addresses for City.
     */
    public function addresses()
    {
        return $this->hasMany('\App\Models\Address');
    }
}
