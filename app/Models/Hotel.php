<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name',
        'max_rooms',
        'created_by',
    ];
    use HasFactory;

    public function provider()
    {
        return $this->hasMany('App\Models\Provider');
    }

}
