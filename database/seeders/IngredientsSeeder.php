<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use ingredients
use App\Models\Ingredients;
use App\Models\IngredientType;

use App\Services\Helper\SlugGenerator;

class IngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //insert fruits
        $this->insertFruits();

        //insert vegetables
        $this->insertVegetables();

        //insert meat
        $this->insertMeat();

        //insert fish
        $this->insertFish();

        //insert dairy
        $this->insertDairy();

        //insert grains
        $this->insertGrains();

        //insert spices
        $this->insertSpices();
    }

    function insertSpices()
    {
        // Buscar el ingredient type de especias
        $ingredient_type_spices = IngredientType::where('slug', 'spices')->first();

        // Crear ingredientes de especias
        Ingredients::create([
            'name' => 'Salt',
            'name_es' => 'Sal',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Salt'),
            'ingredient_type_id' => $ingredient_type_spices->id,
        ]);

        Ingredients::create([
            'name' => 'Black pepper',
            'name_es' => 'Pimienta negra',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Black pepper'),
            'ingredient_type_id' => $ingredient_type_spices->id,
        ]);

        Ingredients::create([
            'name' => 'Garlic powder',
            'name_es' => 'Ajo en polvo',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Garlic powder'),
            'ingredient_type_id' => $ingredient_type_spices->id,
        ]);

        Ingredients::create([
            'name' => 'Cumin',
            'name_es' => 'Comino',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Cumin'),
            'ingredient_type_id' => $ingredient_type_spices->id,
        ]);

        Ingredients::create([
            'name' => 'Paprika',
            'name_es' => 'Pimentón',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Paprika'),
            'ingredient_type_id' => $ingredient_type_spices->id,
        ]);

        Ingredients::create([
            'name' => 'Cinnamon',
            'name_es' => 'Canela',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Cinnamon'),
            'ingredient_type_id' => $ingredient_type_spices->id,
        ]);

        Ingredients::create([
            'name' => 'Turmeric',
            'name_es' => 'Cúrcuma',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Turmeric'),
            'ingredient_type_id' => $ingredient_type_spices->id,
        ]);

        Ingredients::create([
            'name' => 'Ginger',
            'name_es' => 'Jengibre',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Ginger'),
            'ingredient_type_id' => $ingredient_type_spices->id,
        ]);

        Ingredients::create([
            'name' => 'Nutmeg',
            'name_es' => 'Nuez moscada',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Nutmeg'),
            'ingredient_type_id' => $ingredient_type_spices->id,
        ]);

        Ingredients::create([
            'name' => 'Oregano',
            'name_es' => 'Orégano',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Oregano'),
            'ingredient_type_id' => $ingredient_type_spices->id,
        ]);

        Ingredients::create([
            'name' => 'Thyme',
            'name_es' => 'Tomillo',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Thyme'),
            'ingredient_type_id' => $ingredient_type_spices->id,
        ]);

        Ingredients::create([
            'name' => 'Rosemary',
            'name_es' => 'Romero',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Rosemary'),
            'ingredient_type_id' => $ingredient_type_spices->id,
        ]);

        Ingredients::create([
            'name' => 'Parsley',
            'name_es' => 'Perejil',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Parsley'),
            'ingredient_type_id' => $ingredient_type_spices->id,
        ]);

        Ingredients::create([
            'name' => 'Cayenne pepper',
            'name_es' => 'Pimienta de cayena',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Cayenne pepper'),
            'ingredient_type_id' => $ingredient_type_spices->id,
        ]);

        Ingredients::create([
            'name' => 'Bay leaves',
            'name_es' => 'Hojas de laurel',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Bay leaves'),
            'ingredient_type_id' => $ingredient_type_spices->id,
        ]);
    }

    function insertGrains()
    {
        // Buscar el ingredient type de granos
        $ingredient_type_grains = IngredientType::where('slug', 'grains')->first();

        // Crear ingredientes de granos
        Ingredients::create([
            'name' => 'Rice',
            'name_es' => 'Arroz',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Rice'),
            'ingredient_type_id' => $ingredient_type_grains->id,
        ]);

        Ingredients::create([
            'name' => 'Quinoa',
            'name_es' => 'Quinoa',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Quinoa'),
            'ingredient_type_id' => $ingredient_type_grains->id,
        ]);

        Ingredients::create([
            'name' => 'Oats',
            'name_es' => 'Avena',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Oats'),
            'ingredient_type_id' => $ingredient_type_grains->id,
        ]);

        Ingredients::create([
            'name' => 'Wheat flour',
            'name_es' => 'Harina de trigo',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Wheat flour'),
            'ingredient_type_id' => $ingredient_type_grains->id,
        ]);

        Ingredients::create([
            'name' => 'Cornmeal',
            'name_es' => 'Harina de maíz',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Cornmeal'),
            'ingredient_type_id' => $ingredient_type_grains->id,
        ]);

        Ingredients::create([
            'name' => 'Barley',
            'name_es' => 'Cebada',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Barley'),
            'ingredient_type_id' => $ingredient_type_grains->id,
        ]);

        Ingredients::create([
            'name' => 'Buckwheat',
            'name_es' => 'Trigo sarraceno',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Buckwheat'),
            'ingredient_type_id' => $ingredient_type_grains->id,
        ]);

        Ingredients::create([
            'name' => 'Couscous',
            'name_es' => 'Cuscús',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Couscous'),
            'ingredient_type_id' => $ingredient_type_grains->id,
        ]);

        Ingredients::create([
            'name' => 'Millet',
            'name_es' => 'Mijo',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Millet'),
            'ingredient_type_id' => $ingredient_type_grains->id,
        ]);

        Ingredients::create([
            'name' => 'Bulgur',
            'name_es' => 'Bulgur',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Bulgur'),
            'ingredient_type_id' => $ingredient_type_grains->id,
        ]);

        Ingredients::create([
            'name' => 'Rye flour',
            'name_es' => 'Harina de centeno',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Rye flour'),
            'ingredient_type_id' => $ingredient_type_grains->id,
        ]);

        Ingredients::create([
            'name' => 'Spelt flour',
            'name_es' => 'Harina de espelta',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Spelt flour'),
            'ingredient_type_id' => $ingredient_type_grains->id,
        ]);

        Ingredients::create([
            'name' => 'Corn tortillas',
            'name_es' => 'Tortillas de maíz',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Corn tortillas'),
            'ingredient_type_id' => $ingredient_type_grains->id,
        ]);

        Ingredients::create([
            'name' => 'Whole wheat bread',
            'name_es' => 'Pan integral',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Whole wheat bread'),
            'ingredient_type_id' => $ingredient_type_grains->id,
        ]);

        Ingredients::create([
            'name' => 'Brown rice',
            'name_es' => 'Arroz integral',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Brown rice'),
            'ingredient_type_id' => $ingredient_type_grains->id,
        ]);
    }

    function insertDairy()
    {

        // Buscar el ingredient type de lácteos
        $ingredient_type_dairy = IngredientType::where('slug', 'dairy')->first();

        // Crear ingredientes lácteos
        Ingredients::create([
            'name' => 'Milk',
            'name_es' => 'Leche',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Milk'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
        ]);

        Ingredients::create([
            'name' => 'Cheese',
            'name_es' => 'Queso',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Cheese'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
        ]);

        Ingredients::create([
            'name' => 'Yogurt',
            'name_es' => 'Yogur',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Yogurt'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
        ]);

        Ingredients::create([
            'name' => 'Butter',
            'name_es' => 'Mantequilla',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Butter'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
        ]);

        Ingredients::create([
            'name' => 'Sour cream',
            'name_es' => 'Crema agria',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Sour cream'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
        ]);

        Ingredients::create([
            'name' => 'Cream cheese',
            'name_es' => 'Queso crema',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Cream cheese'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
        ]);

        Ingredients::create([
            'name' => 'Whipping cream',
            'name_es' => 'Crema de batir',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Whipping cream'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
        ]);

        Ingredients::create([
            'name' => 'Condensed milk',
            'name_es' => 'Leche condensada',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Condensed milk'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
        ]);

        Ingredients::create([
            'name' => 'Evaporated milk',
            'name_es' => 'Leche evaporada',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Evaporated milk'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
        ]);

        Ingredients::create([
            'name' => 'Mozzarella cheese',
            'name_es' => 'Queso mozzarella',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Mozzarella cheese'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
        ]);

        Ingredients::create([
            'name' => 'Cheddar cheese',
            'name_es' => 'Queso cheddar',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Cheddar cheese'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
        ]);

        Ingredients::create([
            'name' => 'Parmesan cheese',
            'name_es' => 'Queso parmesano',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Parmesan cheese'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
        ]);

        Ingredients::create([
            'name' => 'Gouda cheese',
            'name_es' => 'Queso gouda',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Gouda cheese'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
        ]);

        Ingredients::create([
            'name' => 'Greek yogurt',
            'name_es' => 'Yogur griego',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Greek yogurt'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
        ]);

        Ingredients::create([
            'name' => 'Cottage cheese',
            'name_es' => 'Queso cottage',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Cottage cheese'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
        ]);

        Ingredients::create([
            'name' => 'Ricotta cheese',
            'name_es' => 'Queso ricotta',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Ricotta cheese'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
        ]);
    }

    function insertFish()
    {

        $ingredient_type_fish = IngredientType::where('slug', 'fish')->first();
        Ingredients::create([
            'name' => 'Salmon fillet',
            'name_es' => 'Filete de salmón',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Salmon fillet'),
            'ingredient_type_id' => $ingredient_type_fish->id,
        ]);
        Ingredients::create([
            'name' => 'Tuna steak',
            'name_es' => 'Filete de atún',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Tuna steak'),
            'ingredient_type_id' => $ingredient_type_fish->id,
        ]);

        Ingredients::create([
            'name' => 'Cod fillet',
            'name_es' => 'Filete de bacalao',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Cod fillet'),
            'ingredient_type_id' => $ingredient_type_fish->id,
        ]);

        Ingredients::create([
            'name' => 'Swordfish steak',
            'name_es' => 'Filete de pez espada',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Swordfish steak'),
            'ingredient_type_id' => $ingredient_type_fish->id,
        ]);

        Ingredients::create([
            'name' => 'Mackerel fillet',
            'name_es' => 'Filete de caballa',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Mackerel fillet'),
            'ingredient_type_id' => $ingredient_type_fish->id,
        ]);

        Ingredients::create([
            'name' => 'Haddock fillet',
            'name_es' => 'Filete de eglefino',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Haddock fillet'),
            'ingredient_type_id' => $ingredient_type_fish->id,
        ]);

        Ingredients::create([
            'name' => 'Halibut fillet',
            'name_es' => 'Filete de halibut',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Halibut fillet'),
            'ingredient_type_id' => $ingredient_type_fish->id,
        ]);

        Ingredients::create([
            'name' => 'Red snapper fillet',
            'name_es' => 'Filete de pargo rojo',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Red snapper fillet'),
            'ingredient_type_id' => $ingredient_type_fish->id,
        ]);

        Ingredients::create([
            'name' => 'Trout fillet',
            'name_es' => 'Filete de trucha',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Trout fillet'),
            'ingredient_type_id' => $ingredient_type_fish->id,
        ]);

        Ingredients::create([
            'name' => 'Sardines',
            'name_es' => 'Sardinas',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Sardines'),
            'ingredient_type_id' => $ingredient_type_fish->id,
        ]);
    }


    function insertMeat()
    {
        $ingredient_type_meat = IngredientType::where('slug', 'meat')->first();

        // Crear ingredientes de carne
        Ingredients::create([
            'name' => 'Chicken breast',
            'name_es' => 'Pechuga de pollo',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Chicken breast'),
            'ingredient_type_id' => $ingredient_type_meat->id,
        ]);
        Ingredients::create([
            'name' => 'Beef steak',
            'name_es' => 'Filete de res',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Beef steak'),
            'ingredient_type_id' => $ingredient_type_meat->id,
        ]);

        Ingredients::create([
            'name' => 'Pork chop',
            'name_es' => 'Chuleta de cerdo',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Pork chop'),
            'ingredient_type_id' => $ingredient_type_meat->id,
        ]);

        Ingredients::create([
            'name' => 'Lamb rack',
            'name_es' => 'Costillas de cordero',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Lamb rack'),
            'ingredient_type_id' => $ingredient_type_meat->id,
        ]);

        Ingredients::create([
            'name' => 'Ground beef',
            'name_es' => 'Carne molida de res',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Ground beef'),
            'ingredient_type_id' => $ingredient_type_meat->id,
        ]);

        Ingredients::create([
            'name' => 'Turkey breast',
            'name_es' => 'Pechuga de pavo',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Turkey breast'),
            'ingredient_type_id' => $ingredient_type_meat->id,
        ]);

        Ingredients::create([
            'name' => 'Bacon',
            'name_es' => 'Tocino',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Bacon'),
            'ingredient_type_id' => $ingredient_type_meat->id,
        ]);

        Ingredients::create([
            'name' => 'Sausage',
            'name_es' => 'Salchicha',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Sausage'),
            'ingredient_type_id' => $ingredient_type_meat->id,
        ]);

        Ingredients::create([
            'name' => 'Jamón Serrano',
            'name_es' => 'Jamón Serrano',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Jamón Serrano'),
            'ingredient_type_id' => $ingredient_type_meat->id,
        ]);

        Ingredients::create([
            'name' => 'Jamón Cocido',
            'name_es' => 'Jamón Cocido',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Jamón Cocido'),
            'ingredient_type_id' => $ingredient_type_meat->id,
        ]);
    }


    function insertVegetables()
    {
        //buscar el ingredient type de vegetables
        $ingredient_type_vegetables = IngredientType::where('slug', 'fruit')->first();

        // Crear ingredientes de vegetales
        Ingredients::create([
            'name' => 'Carrot',
            'name_es' => 'Zanahoria',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Carrot'),
            'ingredient_type_id' => $ingredient_type_vegetables->id,
        ]);

        Ingredients::create([
            'name' => 'Broccoli',
            'name_es' => 'Brócoli',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Broccoli'),
            'ingredient_type_id' => $ingredient_type_vegetables->id,
        ]);

        Ingredients::create([
            'name' => 'Spinach',
            'name_es' => 'Espinaca',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Spinach'),
            'ingredient_type_id' => $ingredient_type_vegetables->id,
        ]);

        Ingredients::create([
            'name' => 'Tomato',
            'name_es' => 'Tomate',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Tomato'),
            'ingredient_type_id' => $ingredient_type_vegetables->id,
        ]);

        Ingredients::create([
            'name' => 'Cucumber',
            'name_es' => 'Pepino',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Cucumber'),
            'ingredient_type_id' => $ingredient_type_vegetables->id,
        ]);

        Ingredients::create([
            'name' => 'Bell Pepper',
            'name_es' => 'Pimiento',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Bell Pepper'),
            'ingredient_type_id' => $ingredient_type_vegetables->id,
        ]);

        Ingredients::create([
            'name' => 'Onion',
            'name_es' => 'Cebolla',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Onion'),
            'ingredient_type_id' => $ingredient_type_vegetables->id,
        ]);

        Ingredients::create([
            'name' => 'Lettuce',
            'name_es' => 'Lechuga',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Lettuce'),
            'ingredient_type_id' => $ingredient_type_vegetables->id,
        ]);

        Ingredients::create([
            'name' => 'Zucchini',
            'name_es' => 'Calabacín',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Zucchini'),
            'ingredient_type_id' => $ingredient_type_vegetables->id,
        ]);

        Ingredients::create([
            'name' => 'Potato',
            'name_es' => 'Papa',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Potato'),
            'ingredient_type_id' => $ingredient_type_vegetables->id,
        ]);
    }


    function insertFruits()
    {
        //buscar el ingredient type de fruta
        $ingredient_type_fruit = IngredientType::where('slug', 'vegetable')->first();

        //crear ingredientes de fruta
        Ingredients::create([
            'name' => 'Apple',
            'name_es' => 'Manzana',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Apple'),
            'ingredient_type_id' => $ingredient_type_fruit->id,
        ]);
        // Crear ingredientes de fruta
        Ingredients::create([
            'name' => 'Banana',
            'name_es' => 'Plátano',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Banana'),
            'ingredient_type_id' => $ingredient_type_fruit->id,
        ]);

        Ingredients::create([
            'name' => 'Orange',
            'name_es' => 'Naranja',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Orange'),
            'ingredient_type_id' => $ingredient_type_fruit->id,
        ]);

        Ingredients::create([
            'name' => 'Strawberry',
            'name_es' => 'Fresa',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Strawberry'),
            'ingredient_type_id' => $ingredient_type_fruit->id,
        ]);

        Ingredients::create([
            'name' => 'Grapes',
            'name_es' => 'Uvas',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Grapes'),
            'ingredient_type_id' => $ingredient_type_fruit->id,
        ]);

        Ingredients::create([
            'name' => 'Watermelon',
            'name_es' => 'Sandía',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Watermelon'),
            'ingredient_type_id' => $ingredient_type_fruit->id,
        ]);

        Ingredients::create([
            'name' => 'Pineapple',
            'name_es' => 'Piña',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Pineapple'),
            'ingredient_type_id' => $ingredient_type_fruit->id,
        ]);

        Ingredients::create([
            'name' => 'Mango',
            'name_es' => 'Mango',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Mango'),
            'ingredient_type_id' => $ingredient_type_fruit->id,
        ]);

        Ingredients::create([
            'name' => 'Kiwi',
            'name_es' => 'Kiwi',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Kiwi'),
            'ingredient_type_id' => $ingredient_type_fruit->id,
        ]);

        Ingredients::create([
            'name' => 'Pear',
            'name_es' => 'Pera',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Pear'),
            'ingredient_type_id' => $ingredient_type_fruit->id,
        ]);

        Ingredients::create([
            'name' => 'Cherry',
            'name_es' => 'Cereza',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Cherry'),
            'ingredient_type_id' => $ingredient_type_fruit->id,
        ]);
    }
}
