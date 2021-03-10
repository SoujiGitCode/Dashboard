<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanCode extends Model
{
    protected $fillable = [
        'code',
        'description'
    ];

    public function plans()
    {
        return $this->hasMany('App\Models\Plan');
    }
}
