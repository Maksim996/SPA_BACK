<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the cities for the Region.
     */
    public function cities()
    {
        return $this->hasMany('\App\City')->orderBy('city', 'asc');
    }
}
