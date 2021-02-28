<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        'max_hotels',
        'max_user',
        'description',
    ];
    use HasFactory;

    public function provider()
    {
        return $this->belongsTo('App\Models\Provider');
    }
}