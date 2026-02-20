<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'position'];

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
