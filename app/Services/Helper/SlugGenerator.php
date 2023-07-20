<?php


namespace App\Services\Helper;

use Illuminate\Support\Str;

class SlugGenerator
{
    public static function generateUniqueSlug($modelClass, $name)
    {
        $slug = Str::slug($name);
        $suffix = 0;

        while ($modelClass::where('slug', $slug)->exists()) {
            $suffix++;
            $hash = substr(md5($slug), 0, 7);
            $slug = Str::slug($name) . '-' . $suffix .  $hash;
        }

        return $slug;
    }
}
