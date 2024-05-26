<?php

declare(strict_types=1);

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            RolesAndPermissionsSeeder::class,
            CategorySeeder::class,
            PropertySeeder::class,
            PropertyValueSeeder::class,
            BrandSeeder::class
        ]);

        $now = Carbon::now();
        DB::table('products')->insert([
            'name' => 'Пиджак',
            'price' => 3800,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis metus facilisis, sagittis nisi sed, commodo Massa. Proin tempor mi dolor, eget volutpat sem gradida vel. In non lorem dictum, interdum nisi sed, dapibus mauris.',
            'alias' => Str::slug('Пиджак'),
            'brand_id' => 1,
            'category_id' => 2,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('products')->insert([
            'name' => 'Футболка',
            'price' => 2990,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis metus facilisis, sagittis nisi sed, commodo Massa. Proin tempor mi dolor, eget volutpat sem gradida vel. In non lorem dictum, interdum nisi sed, dapibus mauris.',
            'alias' => Str::slug('Футболка'),
            'brand_id' => 4,
            'category_id' => 2,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('products')->insert([
            'name' => 'Футболка 2',
            'price' => 2350,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis metus facilisis, sagittis nisi sed, commodo Massa. Proin tempor mi dolor, eget volutpat sem gradida vel. In non lorem dictum, interdum nisi sed, dapibus mauris.',
            'alias' => Str::slug('Футболка 2'),
            'brand_id' => 1,
            'category_id' => 2,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('products')->insert([
            'name' => 'Толстовка',
            'price' => 4120,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis metus facilisis, sagittis nisi sed, commodo Massa. Proin tempor mi dolor, eget volutpat sem gradida vel. In non lorem dictum, interdum nisi sed, dapibus mauris.',
            'alias' => Str::slug('Толстовка'),
            'brand_id' => 2,
            'category_id' => 4,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
