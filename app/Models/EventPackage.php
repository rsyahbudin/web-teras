<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventPackage extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'price', 'features', 'image'];

    protected $casts = [
        'features' => 'array',
    ];
}
