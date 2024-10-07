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
        Schema::create('products', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('product_name');
            $table->string('image');
            $table->text('description'); 
            $table->integer('view')->default(0);
            $table->string('size')->nullable(); 
            $table->string('color')->nullable(); 
            $table->decimal('price', 8, 2); 
            $table->integer('discount')->nullable();
            $table->integer('quantity')->default(0); 
            $table->tinyInteger('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
