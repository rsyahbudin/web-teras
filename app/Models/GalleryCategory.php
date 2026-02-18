<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    protected $fillable = ['name', 'slug', 'description'];

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
