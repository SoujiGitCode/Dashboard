<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'provider_id',
        'plan_code_id',
        'max_hotels',
        'max_users',
        'description',
    ];

    public function provider()
    {
        return $this->belongsTo('App\Models\Provider');
    }

    public function plan_code()
    {
        return $this->hasOne('App\Models\PlanCode');
    }
}
