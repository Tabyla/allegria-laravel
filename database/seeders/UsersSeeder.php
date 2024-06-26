<?php

declare(strict_types=1);

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('users')->insert([
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('user_profiles')->insert([
            'user_id' => 1,
            'surname' => 'Admin',
            'firstname' => 'Admin',
            'phone' => '89126110811',
            'address' => 'г. Екатеринбург, ул. Щорса, 130, кв. 97',
        ]);

        DB::table('users')->insert([
            'email' => 'user@example.com',
            'password' => Hash::make('user'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('user_profiles')->insert([
            'user_id' => 2,
            'surname' => 'User',
            'firstname' => 'User',
            'phone' => '89126110811',
            'address' => 'г. Екатеринбург, ул. Белинского, 149, кв. 67',
        ]);
    }
}
