<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanCode extends Model
{
    protected $fillable = [
        'name',
        'max_hotels',
        'max_users',
        'code',
        'description'
    ];

    public function plans()
    {
        return $this->hasMany('App\Models\Plan');
    }
}
