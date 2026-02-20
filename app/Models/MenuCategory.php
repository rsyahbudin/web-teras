<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'image', 'position'];

    public function items()
    {
        return $this->hasMany(MenuItem::class);
    }
}
