<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $fillable = ['key', 'value', 'type'];

    public static function getValue($key, $default = null)
    {
        $content = self::where('key', $key)->first();
        return $content ? $content->value : $default;
    }
}
