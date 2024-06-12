<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
            RolesAndPermissionsSeeder::class,
            PropertiesSeeder::class,
            PropertyValuesSeeder::class,
            CategoriesSeeder::class,
            BrandsSeeder::class,
            ProductsSeeder::class,
            ProductImagesSeeder::class,
        ]);
    }
}
