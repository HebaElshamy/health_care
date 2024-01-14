<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'ادمن1',
            'email' => 'admin@admin',
            'password' => bcrypt('123456'),
            'phone' => '123456789',
            'status' => 'super_admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
