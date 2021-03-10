<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id',
        'hotels',
        'alias',
        'status',
        'created_by',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function plan()
    {
        return $this->hasOne('App\Models\Plan');
    }

    public function hotel()
    {
        return $this->hasMany('App\Models\Hotel');
    }

}


