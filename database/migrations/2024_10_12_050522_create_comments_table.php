<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự động với kiểu unsigned big integer
            $table->text('content');
            $table->unsignedInteger('user_id'); // Cột user_id cần phải là unsigned integer
            $table->unsignedBigInteger('product_id'); // Cột product_id là unsigned big integer
            $table->timestamps();
        
            // Khóa ngoại cho user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // Khóa ngoại cho product_id
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
