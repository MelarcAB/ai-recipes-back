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
            $slug = Str::slug($name) . '-' . $suffix;
        }

        return $slug;
    }
}
