<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /**
     * Get the Streets for City.
     */
    public function streets()
    {
        return $this->hasMany('\App\Street');
    }
}
