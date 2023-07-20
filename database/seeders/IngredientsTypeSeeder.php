<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//ingredients_type
use App\Models\IngredientType;

class IngredientsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IngredientType::create([
            'name' => 'Fruit',
            'name_es' => 'Fruta',
            'slug' => 'fruit',
        ]);

        IngredientType::create([
            'name' => 'Vegetable',
            'name_es' => 'Verdura',
            'slug' => 'vegetable',
        ]);

        IngredientType::create([
            'name' => 'Meat',
            'name_es' => 'Carne',
            'slug' => 'meat',
        ]);

        IngredientType::create([
            'name' => 'Fish',
            'name_es' => 'Pescado',
            'slug' => 'fish',
        ]);
        IngredientType::create([
            'name' => 'Dairy',
            'name_es' => 'Lácteos',
            'slug' => 'dairy',
        ]);

        IngredientType::create([
            'name' => 'Grains',
            'name_es' => 'Cereales',
            'slug' => 'grains',
        ]);

        IngredientType::create([
            'name' => 'Spices',
            'name_es' => 'Especias',
            'slug' => 'spices',
        ]);

        IngredientType::create([
            'name' => 'Sweets',
            'name_es' => 'Dulces',
            'slug' => 'sweets',
        ]);
    }
}
