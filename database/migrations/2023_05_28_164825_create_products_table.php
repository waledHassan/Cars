<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name_en')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('slug')->nullable();
            $table->integer('price')->nullable();
            $table->string('discription_en')->nullable();
            $table->string('discription_ar')->nullable();
            $table->string('image')->nullable();
            
            $table->unsignedBigInteger('category');
            $table->foreign('category')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('approve')->nullable();
            $table->timestamps();
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
