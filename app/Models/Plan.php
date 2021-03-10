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
        'prover_id',
        'plan_code_id',
        'max_hotels',
        'max_user',
        'description',
    ];

    public function provider()
    {
        return $this->belongsTo('App\Models\Provider');
    }

    public function plan_code()
    {
        return $this->belongsTo('App\Models\PlanCode');

    }
}
