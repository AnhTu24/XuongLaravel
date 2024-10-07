<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        foreach (range(1, 40) as $index) {
            DB::table('products')->insert([
                'category_id' => rand(1, 5), 
                'product_name' => fake()->word(),
                'image' => fake()->imageUrl(640, 480, 'fashion', true), 
                'description' => fake()->sentence(), // Fix lỗi chính tả 'discription'
                'view' => rand(0, 100), 
                'size' => fake()->randomElement(['S', 'M', 'L', 'XL']), // Kích thước giả lập
                'color' => fake()->safeColorName(), // Màu sắc ngẫu nhiên
                'price' => fake()->randomFloat(2, 10, 1000), // Giá từ 10 đến 1000 với 2 số thập phân
                'discount' => rand(0, 50), // Discount là số tròn chục
                'quantity' => rand(1, 100), // Số lượng ngẫu nhiên
                'active' => 1, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
    }
}
