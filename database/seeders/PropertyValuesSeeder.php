<?php

declare(strict_types=1);

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyValuesSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $sizes = ['XS', 'S', 'M', 'L', 'XL', 'XP'];
        foreach ($sizes as $size) {
            DB::table('property_values')->insert([
                'name' => $size,
                'property_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        $colors = ['Чёрный', 'Красный', 'Синий', 'Зеленый', 'Белый', 'Фиолетовый'];
        foreach ($colors as $color) {
            DB::table('property_values')->insert([
                'name' => $color,
                'property_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
