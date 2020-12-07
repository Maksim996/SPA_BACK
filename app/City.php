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
     * Get the Streets for City.
     */
    public function streets()
    {
        return $this->hasMany('\App\Street');
    }
}
