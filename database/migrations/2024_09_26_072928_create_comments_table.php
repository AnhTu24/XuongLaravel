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
            $table->increments('id_comment'); // Khóa chính
            $table->text('content'); // Nội dung bình luận
            $table->unsignedInteger('user_id'); // Liên kết đến bảng users
            $table->unsignedBigInteger('product_id'); // Liên kết đến bảng products
            $table->timestamp('comment_date')->useCurrent(); // Ngày bình luận mặc định là thời gian hiện tại
            $table->timestamps(); // Tạo created_at và updated_at
    
            // Tạo khóa ngoại nối với bảng users và products
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
