<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        foreach (range(1, 10) as $index) {
            DB::table('users')->insert([
                'username' => fake()->userName,
                'password' => Hash::make('password'), // Mật khẩu giả định
                'fullname' => fake()->name,
                'image' => fake()->optional()->imageUrl(640, 480), // Có thể null
                'email' => fake()->unique()->safeEmail,
                'phone' => fake()->numerify('0##########'), // Giả định định dạng số điện thoại
                'address' => fake()->address,
                'role' => fake()->boolean(20), // 20% sẽ là admin
                'active' => fake()->numberBetween(0, 1), // Kích hoạt hoặc không
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
