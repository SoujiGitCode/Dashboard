<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanCode extends Model
{
    protected $fillable = [
        'code',
        'description'
    ];

    use HasFactory;

    public function provider()
    {
        return  $this->hasMany('App\Models\Provider');
    }
}
