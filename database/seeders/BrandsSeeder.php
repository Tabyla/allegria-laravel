<?php

declare(strict_types=1);

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $brands = ['American Vintage', 'Deha', 'George Gina & Lucy', 'Birkenstock'];
        foreach ($brands as $brand) {
            DB::table('brands')->insert([
                'name' => $brand,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
