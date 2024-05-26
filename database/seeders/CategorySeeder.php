<?php

declare(strict_types=1);

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Одежда',
            'Кофты и пиджаки',
            'Свитера',
            'Толстовки',
            'Платья',
            'Юбки',
            'Футболки и топы',
            'Брюки и шорты',
            'Рубашки',
            'Комбинезоны',
            'Леггинсы',
            'Обувь',
            'Кроссовки',
            'Шлепанцы',
            'Сумки',
            'Рюкзаки',
            'Поясные',
            'Спортивные',
            'Шопперы',
            'Аксессуары',
            'Головные уборы',
            'Перчатки',
            'Шарфы и платки',
            'Носки',
            'Гетры'
        ];
        $now = Carbon::now();

        DB::table('categories')->insert([
            'name' => $categories[0],
            'alias' => Str::slug($categories[0]),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $parentIdClothes = DB::table('categories')->where('alias', Str::slug('Одежда'))->value('id');
        $subcategoriesClothes = array_slice($categories, 1, 10);
        foreach ($subcategoriesClothes as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'alias' => Str::slug($category),
                'parent_id' => $parentIdClothes,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        DB::table('categories')->insert([
            'name' => 'Обувь',
            'alias' => Str::slug('Обувь'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $parentIdShoes = DB::table('categories')->where('alias', Str::slug('Обувь'))->value('id');
        $subcategoriesShoes = array_slice($categories, 12, 2);
        foreach ($subcategoriesShoes as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'alias' => Str::slug($category),
                'parent_id' => $parentIdShoes,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        DB::table('categories')->insert([
            'name' => 'Сумки',
            'alias' => Str::slug('Сумки'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $parentIdBags = DB::table('categories')->where('alias', Str::slug('Сумки'))->value('id');
        $subcategoriesBags = array_slice($categories, 15, 4);
        foreach ($subcategoriesBags as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'alias' => Str::slug($category),
                'parent_id' => $parentIdBags,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        DB::table('categories')->insert([
            'name' => 'Аксессуары',
            'alias' => Str::slug('Аксессуары'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $parentIdAccessories = DB::table('categories')->where('alias', Str::slug('Аксессуары'))->value('id');
        $subcategoriesAccessories = array_slice($categories, 20, 6);
        foreach ($subcategoriesAccessories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'alias' => Str::slug($category),
                'parent_id' => $parentIdAccessories,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
