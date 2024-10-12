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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id'); // Khóa chính
            $table->string('username', 255);
            $table->string('password', 255);
            $table->string('fullname', 255);
            $table->string('image', 255)->nullable(); // Có thể NULL
            $table->string('email', 255);
            $table->string('phone', 11);
            $table->string('address', 255)->nullable();
            $table->boolean('role')->default(0); // Mặc định giá trị là 0 (người dùng thông thường)
            $table->tinyInteger('active')->default(1); // Mặc định kích hoạt là 1
            $table->timestamps(); // Tạo created_at và updated_at
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
