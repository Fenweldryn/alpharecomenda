<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment',
        'recommended',
        'service_id',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'recommended' => 'boolean',
        'service_id' => 'integer',
        'user_id' => 'integer',
    ];


    public function service()
    {
        return $this->belongsTo(\App\Models\Service::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
