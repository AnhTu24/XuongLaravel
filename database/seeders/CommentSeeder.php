<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        foreach (range(1, 100) as $index) {
            DB::table('comments')->insert([
                'content' => fake()->paragraph,
                'user_id' => fake()->numberBetween(1, 10), // id người dùng từ 1 đến 10
                'product_id' => fake()->numberBetween(1, 40), // id sản phẩm từ 1 đến 40
                'comment_date' => fake()->dateTimeThisYear, // Thời gian bình luận trong năm nay
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
