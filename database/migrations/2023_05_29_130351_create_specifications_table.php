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
        Schema::create('specifications', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('username')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('address')->nullable();
            $table->integer('discount')->nullable();

            $table->unsignedBigInteger('category');
            $table->foreign('category')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('sub_category')->nullable();

            $table->unsignedBigInteger('type');
            $table->foreign('type')
                ->references('id')
                ->on('types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                
            $table->unsignedBigInteger('status');
            $table->foreign('status')
                ->references('id')
                ->on('status')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('use');
            $table->foreign('use')
                ->references('id')
                ->on('uses')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('brand');
            $table->foreign('brand')
                ->references('id')
                ->on('brands')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('origin')->nullable();
            $table->unsignedBigInteger('seller_type');
            $table->foreign('seller_type')
                ->references('id')
                ->on('seller_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('fuel_type');
            $table->foreign('fuel_type')
                ->references('id')
                ->on('fuel_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('wheel_position');
            $table->foreign('wheel_position')
                ->references('id')
                ->on('wheel_positions')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('color_en')->nullable()->nullable();
            $table->string('color_ar')->nullable()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specifications');
    }
};
