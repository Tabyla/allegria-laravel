<?php

declare(strict_types=1);

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('properties')->insert([
            'name' => 'Размер',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('properties')->insert([
            'name' => 'Цвет',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
