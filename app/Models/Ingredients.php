<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    use HasFactory;


    //table name
    protected $table = 'ingredients';

    //usar slug en vez de id en la url
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
