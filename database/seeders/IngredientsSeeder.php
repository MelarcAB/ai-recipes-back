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
            'image' => 'https://ark.wiki.gg/images/b/bd/Raw_Salt.png'
        ]);

        Ingredients::create([
            'name' => 'Black pepper',
            'name_es' => 'Pimienta negra',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Black pepper'),
            'ingredient_type_id' => $ingredient_type_spices->id,
            'image' => 'https://nectarfruit.es/wp-content/uploads/2022/02/10058-pimienta-negra-de-penja-en-grano-80g-terre-exotique-2.jpg'

        ]);
        Ingredients::create([
            'name' => 'Parsley',
            'name_es' => 'Perejil',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Parsley'),
            'ingredient_type_id' => $ingredient_type_spices->id,
            'image' => 'https://images.vexels.com/media/users/3/149069/isolated/lists/057459bfe5e9abca3770d23188059cbf-ilustracion-de-hierba-de-perejil-de-jardin.png'

        ]);

        Ingredients::create([
            'name' => 'Garlic powder',
            'name_es' => 'Ajo en polvo',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Garlic powder'),
            'ingredient_type_id' => $ingredient_type_spices->id,
            'image' => 'https://res.cloudinary.com/estebandiaz/image/upload/w_256,f_auto/cocinario-beta-foods/5f22b5cc6eb30acead5eb9a2.png'

        ]);

        Ingredients::create([
            'name' => 'Cumin',
            'name_es' => 'Comino',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Cumin'),
            'ingredient_type_id' => $ingredient_type_spices->id,
            'image' => 'https://m.media-amazon.com/images/I/71QQKUmYxoL._UC256,256_CACC,256,256_.jpg'

        ]);

        Ingredients::create([
            'name' => 'Paprika',
            'name_es' => 'Pimentón',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Paprika'),
            'ingredient_type_id' => $ingredient_type_spices->id,
            'image' => 'https://ipcdn.freshop.com/resize?url=https://images.freshop.com/00033844001681/a8b3b14d830c43acaf00c7d0d5ad3430_large.png&width=256&type=webp&quality=80'

        ]);

        Ingredients::create([
            'name' => 'Cinnamon',
            'name_es' => 'Canela',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Cinnamon'),
            'ingredient_type_id' => $ingredient_type_spices->id,
            'image' => 'https://res.cloudinary.com/estebandiaz/image/upload/w_256,f_auto/cocinario-beta-foods/5f22b5cc6eb30acead5eb9a5'

        ]);

        Ingredients::create([
            'name' => 'Turmeric',
            'name_es' => 'Cúrcuma',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Turmeric'),
            'ingredient_type_id' => $ingredient_type_spices->id,
            'image' => 'https://vizananutrition.com/wp-content/uploads/2019/09/modAntioxidante.png'

        ]);

        Ingredients::create([
            'name' => 'Ginger',
            'name_es' => 'Jengibre',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Ginger'),
            'ingredient_type_id' => $ingredient_type_spices->id,
            'image' => 'https://www.mejororganico.com/web/image/product.template/53/image_256'

        ]);

        Ingredients::create([
            'name' => 'Nutmeg',
            'name_es' => 'Nuez moscada',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Nutmeg'),
            'ingredient_type_id' => $ingredient_type_spices->id,
            'image' => 'https://m.media-amazon.com/images/I/71NqVviE6nL._AC_UF1000,1000_QL80_.jpg'

        ]);

        Ingredients::create([
            'name' => 'Oregano',
            'name_es' => 'Orégano',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Oregano'),
            'ingredient_type_id' => $ingredient_type_spices->id,
            'image' => 'https://ipcdn.freshop.com/resize?url=https://images.freshop.com/00052100002729/f89b874501e8c4062b4617c8b7fa9c13_large.png&width=256&type=webp&quality=80'

        ]);

        Ingredients::create([
            'name' => 'Thyme',
            'name_es' => 'Tomillo',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Thyme'),
            'ingredient_type_id' => $ingredient_type_spices->id,
            'image' => 'https://infraganti.net/wp-content/uploads/2016/12/tomillo.jpg'

        ]);

        Ingredients::create([
            'name' => 'Rosemary',
            'name_es' => 'Romero',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Rosemary'),
            'ingredient_type_id' => $ingredient_type_spices->id,
            'image' => 'https://i1.adis.ws/i/Brakes/113877_1?$pdp-mobile$&img404=image-not-available&v=1&locale=en-gb'

        ]);



        Ingredients::create([
            'name' => 'Cayenne pepper',
            'name_es' => 'Pimienta de cayena',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Cayenne pepper'),
            'ingredient_type_id' => $ingredient_type_spices->id,
            'image' => 'https://m.media-amazon.com/images/I/91kjPSJKdPL._AC_SY200_QL15_.jpg'

        ]);

        Ingredients::create([
            'name' => 'Bay leaves',
            'name_es' => 'Hojas de laurel',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Bay leaves'),
            'ingredient_type_id' => $ingredient_type_spices->id,
            'image' => 'https://lasrecetasdeemma.es/foolygyl/laurel-674504_640.jpg'

        ]);
    }


    function insertGrains()
    {
        // Buscar el ingredient type de granos
        $ingredient_type_grains = IngredientType::where('slug', 'grains')->first();

        Ingredients::create([
            'name' => 'Spaghetti',
            'name_es' => 'Espaguetis',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Spaghetti'),
            'ingredient_type_id' => $ingredient_type_grains->id,
            'image' => 'https://media.istockphoto.com/id/1432398900/es/foto/espaguetis-crudos-aislados-sobre-un-fondo-blanco-pasta-cruda.jpg?s=170667a&w=0&k=20&c=TC3xmGuklo0vDWlfqa0wx15jWOGTZiTkyJn-JxnJAwk='
        ]);

        // Crear ingredientes de granos
        Ingredients::create([
            'name' => 'Rice',
            'name_es' => 'Arroz',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Rice'),
            'ingredient_type_id' => $ingredient_type_grains->id,
            'image' => 'https://res.cloudinary.com/estebandiaz/image/upload/w_256,f_auto/cocinario-beta-foods/5f22b5606eb30acead5eb6aa'
        ]);

        Ingredients::create([
            'name' => 'Quinoa',
            'name_es' => 'Quinoa',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Quinoa'),
            'ingredient_type_id' => $ingredient_type_grains->id,
            'image' => 'https://c-pi.niceshops.com/upload/image/product/large/default/55227_7e03d964.256x256.jpg'
        ]);

        Ingredients::create([
            'name' => 'Oats',
            'name_es' => 'Avena',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Oats'),
            'ingredient_type_id' => $ingredient_type_grains->id,
            'image' => 'https://c-pi.niceshops.com/upload/image/product/large/default/55227_7e03d964.256x256.jpg'

        ]);

        Ingredients::create([
            'name' => 'Wheat flour',
            'name_es' => 'Harina de trigo',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Wheat flour'),
            'ingredient_type_id' => $ingredient_type_grains->id,
            'image' => 'https://es.yamatonoodle.com/wp-content/uploads/2021/08/6-2.jpg'

        ]);

        Ingredients::create([
            'name' => 'Cornmeal',
            'name_es' => 'Harina de maíz',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Cornmeal'),
            'ingredient_type_id' => $ingredient_type_grains->id,
            'image' => 'https://www.cocinista.es/download/bancorecursos/ingredientes/ingrediente-harina-de-maiz.jpg'
        ]);

        Ingredients::create([
            'name' => 'Barley',
            'name_es' => 'Cebada',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Barley'),
            'ingredient_type_id' => $ingredient_type_grains->id,
            'image' => 'https://lasjarasonline.com/wp-content/uploads/2015/07/products-cebada-2-carreras4-300x300.jpg'
        ]);

        Ingredients::create([
            'name' => 'Buckwheat',
            'name_es' => 'Trigo sarraceno',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Buckwheat'),
            'ingredient_type_id' => $ingredient_type_grains->id,
            'image' => 'https://www.elamasadero.com/1400-large_default/granos-de-trigo-panificable-ecologico-800-g-.jpg'
        ]);

        Ingredients::create([
            'name' => 'Couscous',
            'name_es' => 'Cuscús',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Couscous'),
            'ingredient_type_id' => $ingredient_type_grains->id,
            'image' => 'https://bigoven-res.cloudinary.com/image/upload/d_recipe-no-image.jpg,t_recipe-256/creamy-couscous-parmesan-05f5a8.jpg'
        ]);

        Ingredients::create([
            'name' => 'Millet',
            'name_es' => 'Mijo',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Millet'),
            'ingredient_type_id' => $ingredient_type_grains->id,
            'image' => 'https://m.media-amazon.com/images/I/715fgt84VDL._UC256,256_CACC,256,256_.jpg'
        ]);

        Ingredients::create([
            'name' => 'Bulgur',
            'name_es' => 'Bulgur',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Bulgur'),
            'ingredient_type_id' => $ingredient_type_grains->id,
            'image' => 'https://www.tokfood.com/image/cache/catalog/products/miras-coarse-bulgur-1kg-26919-1-256x256.jpg'
        ]);

        Ingredients::create([
            'name' => 'Rye flour',
            'name_es' => 'Harina de centeno',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Rye flour'),
            'ingredient_type_id' => $ingredient_type_grains->id,
            'image' => 'https://res.cloudinary.com/estebandiaz/image/upload/w_256,f_auto/cocinario-beta-foods/5f22b5606eb30acead5eb6e0.png'
        ]);

        Ingredients::create([
            'name' => 'Spelt flour',
            'name_es' => 'Harina de espelta',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Spelt flour'),
            'ingredient_type_id' => $ingredient_type_grains->id,
            'image' => 'https://c-va.niceshops.com/upload/image/product/large/default/60122_6bc44420.256x256.jpg'
        ]);

        Ingredients::create([
            'name' => 'Corn tortillas',
            'name_es' => 'Tortillas de maíz',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Corn tortillas'),
            'ingredient_type_id' => $ingredient_type_grains->id,
            'image' => 'https://quecarta.com/uploads/2021/07/20/222502771852.256x256.png'
        ]);

        Ingredients::create([
            'name' => 'Whole wheat bread',
            'name_es' => 'Pan integral',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Whole wheat bread'),
            'ingredient_type_id' => $ingredient_type_grains->id,
            'image' => 'https://i.pinimg.com/474x/8d/05/8a/8d058a7f8f7950c1dcacc46255f3cb40.jpg'
        ]);

        Ingredients::create([
            'name' => 'Brown rice',
            'name_es' => 'Arroz integral',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Brown rice'),
            'ingredient_type_id' => $ingredient_type_grains->id,
            'image' => 'https://okdiario.com/img/recetas/2017/02/19/arroz-integral-al-horno-facil.jpg'
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
            'image' => 'https://res.cloudinary.com/estebandiaz/image/upload/w_256,f_auto/cocinario-beta-foods/5f22b5606eb30acead5eb680'
        ]);
        //huevos
        Ingredients::create([
            'name' => 'Eggs',
            'name_es' => 'Huevos',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Eggs'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
            'image' => 'https://ipcdn.freshop.com/resize?url=https://images.freshop.com/1564405684703547487/29dff1ceb2227f220a258462f73d7dab_large.png&width=256&type=webp&quality=80'
        ]);

        Ingredients::create([
            'name' => 'Cheese',
            'name_es' => 'Queso',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Cheese'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
            'image' => 'https://res.cloudinary.com/estebandiaz/image/upload/w_256,f_auto/cocinario-beta-foods/5f22b5606eb30acead5eb5fd.png'
        ]);

        Ingredients::create([
            'name' => 'Yogurt',
            'name_es' => 'Yogur',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Yogurt'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
            'image' => 'https://res.cloudinary.com/estebandiaz/image/upload/w_256,f_auto/cocinario-beta-foods/5f22b5606eb30acead5eb654'
        ]);

        Ingredients::create([
            'name' => 'Butter',
            'name_es' => 'Mantequilla',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Butter'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
            'image' => 'https://res.cloudinary.com/estebandiaz/image/upload/w_256,f_auto/cocinario-beta-foods/5f22b58d6eb30acead5eb7f2.png'
        ]);

        Ingredients::create([
            'name' => 'Sour cream',
            'name_es' => 'Crema agria',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Sour cream'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
            'image' => 'https://ipcdn.freshop.com/resize?url=https://images.freshop.com/00071700280818/e3c815555e47c1e77934a18179c3cf34_large.png&width=256&type=webp&quality=80'
        ]);

        Ingredients::create([
            'name' => 'Cream cheese',
            'name_es' => 'Queso crema(philadelphia)',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Cream cheese'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
            'image' => 'https://ipcdn.freshop.com/resize?url=https://images.freshop.com/00021000000142/6ad86237fe471e45a07a4ab48a63b40c_large.png&width=256&type=webp&quality=80'
        ]);

        Ingredients::create([
            'name' => 'Whipping cream',
            'name_es' => 'Crema de batir',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Whipping cream'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
            'image' => 'https://images.rappi.com.mx/products/981010606-1619010701257.png?d=136x136&e=webp'
        ]);

        Ingredients::create([
            'name' => 'Condensed milk',
            'name_es' => 'Leche condensada',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Condensed milk'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
            'image' => 'https://static.toiimg.com/thumb/53222548.cms?imgsize=214293&width=800&height=800'
        ]);

        Ingredients::create([
            'name' => 'Evaporated milk',
            'name_es' => 'Leche evaporada',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Evaporated milk'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
            'image' => 'https://hellogo.com.mx/cdn/shop/products/977085016-1580930607381.png?v=1607387481'
        ]);

        Ingredients::create([
            'name' => 'Mozzarella cheese',
            'name_es' => 'Queso mozzarella',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Mozzarella cheese'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
            'image' => 'https://img.freepik.com/fotos-premium/queso-mozzarella-bolitas-vista-arriba-fondo-blanco-aislado_323569-240.jpg'

        ]);

        Ingredients::create([
            'name' => 'Cheddar cheese',
            'name_es' => 'Queso cheddar',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Cheddar cheese'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
            'image' => 'https://comercialalias.com/1337-thickbox_default/lonchas-queso-gouda.jpg'
        ]);

        Ingredients::create([
            'name' => 'Parmesan cheese',
            'name_es' => 'Queso parmesano',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Parmesan cheese'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
            'image' => 'https://www.foodexplore.com/media/catalog/product/cache/c22598b710736df84a98d38701ea0335/p/a/parmigiano-reggiano-24-mesi-300g.jpg'
        ]);

        Ingredients::create([
            'name' => 'Gouda cheese',
            'name_es' => 'Queso gouda',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Gouda cheese'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
            'image' => 'https://comercialalias.com/1337-thickbox_default/lonchas-queso-gouda.jpg'

        ]);

        Ingredients::create([
            'name' => 'Greek yogurt',
            'name_es' => 'Yogur griego',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Greek yogurt'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
            'image' => 'https://res.cloudinary.com/estebandiaz/image/upload/w_256,f_auto/cocinario-beta-foods/5f22b5606eb30acead5eb659'
        ]);

        Ingredients::create([
            'name' => 'Cottage cheese',
            'name_es' => 'Queso cottage',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Cottage cheese'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
            'image' => 'https://cheesemaking.com/cdn/shop/products/cottage-cheese-1_grande.jpg?v=1529434175'
        ]);

        Ingredients::create([
            'name' => 'Ricotta cheese',
            'name_es' => 'Queso ricotta',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Ricotta cheese'),
            'ingredient_type_id' => $ingredient_type_dairy->id,
            'image' => 'https://www.wikihow.com/images_en/thumb/1/14/Make-Ricotta-Cheese-Step-13-Version-2.jpg/v4-460px-Make-Ricotta-Cheese-Step-13-Version-2.jpg.webp'


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
            'image' => 'https://www.supermercadosmas.com/media/catalog/product/cache/d91bc430dbe2e3d899436802c7aa5233/i/m/import_catalog_images_33_13_331339_v7.jpg'
        ]);
        Ingredients::create([
            'name' => 'Tuna steak',
            'name_es' => 'Filete de atún',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Tuna steak'),
            'ingredient_type_id' => $ingredient_type_fish->id,
            'image' => 'https://media.istockphoto.com/id/1301917262/es/foto/filetes-de-filete-de-at%C3%BAn-fresco-adornados-con-perejil-aislado-sobre-fondo-blanco.jpg?s=612x612&w=0&k=20&c=FyD32qBXi_bG5serU_5Lm9qGXcP1zWUx8L1lI9i9lfg='
        ]);

        Ingredients::create([
            'name' => 'Cod fillet',
            'name_es' => 'Filete de bacalao',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Cod fillet'),
            'ingredient_type_id' => $ingredient_type_fish->id,
            'image' => 'https://www.peixacasa.cat/wp-content/uploads/2020/06/filet-de-bacall%C3%A0-fresc-peix-a-casa.jpg'
        ]);

        Ingredients::create([
            'name' => 'Swordfish steak',
            'name_es' => 'Filete de pez espada',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Swordfish steak'),
            'ingredient_type_id' => $ingredient_type_fish->id,
            'image' => 'https://www.mariscosapolo.com/wp-content/uploads/2022/04/2000090-pez-espada-chef.jpg'
        ]);

        Ingredients::create([
            'name' => 'Mackerel fillet',
            'name_es' => 'Filete de caballa',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Mackerel fillet'),
            'ingredient_type_id' => $ingredient_type_fish->id,
            'image' => 'https://llenatudespensa.com/caballa-filete-100-160gr_Id-4565.jpg'
        ]);

        Ingredients::create([
            'name' => 'Haddock fillet',
            'name_es' => 'Filete de eglefino',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Haddock fillet'),
            'ingredient_type_id' => $ingredient_type_fish->id,
            'image' => 'https://jetextramar.com/wp-content/uploads/2021/12/280-Filete-de-eglefino-2.jpg'
        ]);

        Ingredients::create([
            'name' => 'Halibut fillet',
            'name_es' => 'Filete de halibut',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Halibut fillet'),
            'ingredient_type_id' => $ingredient_type_fish->id,
            'image' => 'https://sweetstuff.in/wp-content/uploads/2020/06/Halibut-Fillet.jpg'
        ]);

        Ingredients::create([
            'name' => 'Red snapper fillet',
            'name_es' => 'Filete de pargo rojo',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Red snapper fillet'),
            'ingredient_type_id' => $ingredient_type_fish->id,
            'image' => 'https://oceangourmet.com.pa/cdn/shop/products/FILETEDEPARGOROJO.jpg?v=1611439981'
        ]);

        Ingredients::create([
            'name' => 'Trout fillet',
            'name_es' => 'Filete de trucha',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Trout fillet'),
            'ingredient_type_id' => $ingredient_type_fish->id,
            'image' => 'https://sgfm.elcorteingles.es/SGFM/dctm/MEDIA03/202206/14/00118251000156____5__600x600.jpg'
        ]);

        Ingredients::create([
            'name' => 'Sardines',
            'name_es' => 'Sardinas',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Sardines'),
            'ingredient_type_id' => $ingredient_type_fish->id,
            'image' => 'https://www.pescaderiasalgado.es/wp-content/uploads/2022/01/sardinas-beneficios.jpg'
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
            'image' => 'https://www.lavanguardia.com/files/og_thumbnail/uploads/2018/03/13/5e997e247257a.jpeg'
        ]);
        Ingredients::create([
            'name' => 'Beef steak',
            'name_es' => 'Filete de res',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Beef steak'),
            'ingredient_type_id' => $ingredient_type_meat->id,
            'image' => 'https://carnesideal.tienda/cdn/shop/products/RES29-1_2e60392a-c394-4760-9b0c-ffbeabf9a554.jpg?v=1627841606'
        ]);

        Ingredients::create([
            'name' => 'Pork chop',
            'name_es' => 'Chuleta de cerdo',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Pork chop'),
            'ingredient_type_id' => $ingredient_type_meat->id,
            'image' => 'https://grupoaripin.com/wp-content/uploads/2021/02/5f1756e75228e526107117.jpg'
        ]);

        Ingredients::create([
            'name' => 'Lamb rack',
            'name_es' => 'Costillas de cordero',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Lamb rack'),
            'ingredient_type_id' => $ingredient_type_meat->id,
            'image' => 'https://www.gastronomiavasca.net/uploads/image/file/3520/w700_costillar_de_cordero.jpg'
        ]);

        Ingredients::create([
            'name' => 'Ground beef',
            'name_es' => 'Carne molida de res',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Ground beef'),
            'ingredient_type_id' => $ingredient_type_meat->id,
            'image' => 'https://avicolayuri.com/wp-content/uploads/2022/03/Carne-molida-2.jpg'
        ]);

        Ingredients::create([
            'name' => 'Turkey breast',
            'name_es' => 'Pechuga de pavo',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Turkey breast'),
            'ingredient_type_id' => $ingredient_type_meat->id,
            'image' => 'https://aliciatabernero.com/wp-content/uploads/2022/11/Pechuga-de-Pavo-1.jpg'
        ]);

        Ingredients::create([
            'name' => 'Bacon',
            'name_es' => 'Tocino',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Bacon'),
            'ingredient_type_id' => $ingredient_type_meat->id,
            'image' => 'https://www.gastronomiavasca.net/uploads/image/file/3278/bacon.jpg'
        ]);

        Ingredients::create([
            'name' => 'Sausage',
            'name_es' => 'Salchicha',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Sausage'),
            'ingredient_type_id' => $ingredient_type_meat->id,
            'image' => 'https://llenatudespensa.com/salchicha-frankfurt-con-tripa-natural_Id-5844.jpg'
        ]);

        Ingredients::create([
            'name' => 'Jamón Serrano',
            'name_es' => 'Jamón Serrano',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Jamón Serrano'),
            'ingredient_type_id' => $ingredient_type_meat->id,
            'image' => 'https://s1.eestatic.com/2019/12/03/ciencia/nutricion/jamon-ocu_organizacion_de_consumidores_y_usuarios-nutricion_449217087_139553074_1706x960.jpg'
        ]);

        Ingredients::create([
            'name' => 'Jamón Cocido',
            'name_es' => 'Jamón Cocido',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Jamón Cocido'),
            'ingredient_type_id' => $ingredient_type_meat->id,
            'image' => 'https://estaticos-cdn.elperiodico.com/clip/31a47a14-f8d1-4afb-8d81-c5a4695d5b71_alta-libre-aspect-ratio_default_0.jpg'
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
            'image' => 'https://soycomocomo.es/media/2019/03/zanahorias.jpg'
        ]);

        Ingredients::create([
            'name' => 'Broccoli',
            'name_es' => 'Brócoli',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Broccoli'),
            'ingredient_type_id' => $ingredient_type_vegetables->id,
            'image' => 'https://elpoderdelconsumidor.org/wp-content/uploads/2016/11/brocoli.jpg'
        ]);

        Ingredients::create([
            'name' => 'Spinach',
            'name_es' => 'Espinaca',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Spinach'),
            'ingredient_type_id' => $ingredient_type_vegetables->id,
            'image' => 'https://biotrendies.com/wp-content/uploads/2015/07/espinaca.jpg'
        ]);

        Ingredients::create([
            'name' => 'Tomato',
            'name_es' => 'Tomate',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Tomato'),
            'ingredient_type_id' => $ingredient_type_vegetables->id,
            'image' => 'https://www.lovemysalad.com/sites/default/files/styles/image_530x397/public/tomates_-_vladimir_morozov.jpg?itok=XeDbLwfM'
        ]);

        Ingredients::create([
            'name' => 'Cucumber',
            'name_es' => 'Pepino',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Cucumber'),
            'ingredient_type_id' => $ingredient_type_vegetables->id,
            'image' => 'https://sgfm.elcorteingles.es/SGFM/dctm/MEDIA03/201811/26/00118109100018____2__600x600.jpg'
        ]);

        Ingredients::create([
            'name' => 'Bell Pepper',
            'name_es' => 'Pimiento',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Bell Pepper'),
            'ingredient_type_id' => $ingredient_type_vegetables->id,
            'image' => 'https://hortamar.es/wp-content/uploads/pimiento-california-hortamar-1.jpg'
        ]);

        Ingredients::create([
            'name' => 'Onion',
            'name_es' => 'Cebolla',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Onion'),
            'ingredient_type_id' => $ingredient_type_vegetables->id,
            'image' => 'https://www.citrusgourmet.com/es/206-thickbox_default/saco-de-cebollas-12-kg.jpg'
        ]);

        Ingredients::create([
            'name' => 'Lettuce',
            'name_es' => 'Lechuga',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Lettuce'),
            'ingredient_type_id' => $ingredient_type_vegetables->id,
            'image' => 'https://biotrendies.com/wp-content/uploads/2015/07/lechuga.jpg'
        ]);

        Ingredients::create([
            'name' => 'Zucchini',
            'name_es' => 'Calabacín',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Zucchini'),
            'ingredient_type_id' => $ingredient_type_vegetables->id,
            'image' => 'https://www.gastronomiavasca.net/uploads/image/file/3331/w700_calabacin.jpg'
        ]);

        Ingredients::create([
            'name' => 'Potato',
            'name_es' => 'Patata',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Potato'),
            'ingredient_type_id' => $ingredient_type_vegetables->id,
            'image' => 'https://clinicacisem.com/wp-content/uploads/2019/04/patatas.jpg'
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
            'image' => 'https://images.unsplash.com/photo-1619546813926-a78fa6372cd2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
        ]);
        // Crear ingredientes de fruta
        Ingredients::create([
            'name' => 'Banana',
            'name_es' => 'Plátano',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Banana'),
            'ingredient_type_id' => $ingredient_type_fruit->id,
            'image' => "https://images.unsplash.com/photo-1587132137056-bfbf0166836e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2080&q=80"
        ]);

        Ingredients::create([
            'name' => 'Orange',
            'name_es' => 'Naranja',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Orange'),
            'ingredient_type_id' => $ingredient_type_fruit->id,
            'image' => 'https://images.unsplash.com/photo-1609424572698-04d9d2e04954?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80'
        ]);

        Ingredients::create([
            'name' => 'Strawberry',
            'name_es' => 'Fresa',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Strawberry'),
            'ingredient_type_id' => $ingredient_type_fruit->id,
            'image' => 'https://images.unsplash.com/photo-1568966299181-bb7282cc84f0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80'
        ]);

        Ingredients::create([
            'name' => 'Grapes',
            'name_es' => 'Uvas',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Grapes'),
            'ingredient_type_id' => $ingredient_type_fruit->id,
            'image' => 'https://frutasolivar.com/wp-content/uploads/2020/05/40010140_s.jpg'
        ]);

        Ingredients::create([
            'name' => 'Watermelon',
            'name_es' => 'Sandía',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Watermelon'),
            'ingredient_type_id' => $ingredient_type_fruit->id,
            'image' => 'https://cdn.britannica.com/99/143599-050-C3289491/Watermelon.jpg'
        ]);

        Ingredients::create([
            'name' => 'Pineapple',
            'name_es' => 'Piña',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Pineapple'),
            'ingredient_type_id' => $ingredient_type_fruit->id,
            'image' => 'https://www.calfruitos.com/fotos/pr_1473_20191202124545.png'
        ]);

        Ingredients::create([
            'name' => 'Mango',
            'name_es' => 'Mango',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Mango'),
            'ingredient_type_id' => $ingredient_type_fruit->id,
            'image' => 'https://exoticfruitbox.com/wp-content/uploads/2015/10/mango.jpg'
        ]);

        Ingredients::create([
            'name' => 'Kiwi',
            'name_es' => 'Kiwi',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Kiwi'),
            'ingredient_type_id' => $ingredient_type_fruit->id,
            'image' => 'https://www.frutas-hortalizas.com/img/fruites_verdures/presentacio/14.jpg'
        ]);

        Ingredients::create([
            'name' => 'Pear',
            'name_es' => 'Pera',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Pear'),
            'ingredient_type_id' => $ingredient_type_fruit->id,
            'image' => 'https://i.redd.it/guillem-the-frutem-v0-qfq1fd14koaa1.jpg?width=1802&format=pjpg&auto=webp&s=4e511b8bad599752debd397fe259888916f4496b'

        ]);

        Ingredients::create([
            'name' => 'Cherry',
            'name_es' => 'Cereza',
            'slug' => SlugGenerator::generateUniqueSlug(Ingredients::class, 'Cherry'),
            'ingredient_type_id' => $ingredient_type_fruit->id,
            'image' => 'https://www.calfruitos.com/fotos/pr_10_20230705095433.png'

        ]);
    }
}
