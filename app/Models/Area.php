<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $guarded = [];
    protected $fillable = [
        'area'
    ];

    /**
     * Get the regions for the Area.
     */
    public function regions()
    {
        return $this->hasMany('\App\Models\Region')->orderBy('region', 'asc');
    }
}
