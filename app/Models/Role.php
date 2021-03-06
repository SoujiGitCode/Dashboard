<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'code',
        'updated_at',
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

}
