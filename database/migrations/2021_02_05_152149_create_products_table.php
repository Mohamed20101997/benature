<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->nullable();
            $table->string('photo');
            $table->decimal('price', 18, 4)->unsigned();
            $table->decimal('special_price', 18, 4)->unsigned()->nullable();
            $table->boolean('special_price_type')->nullable();
            $table->date('special_price_start')->nullable();
            $table->date('special_price_end')->nullable();
            $table->string('code')->nullable();
            $table->string('type')->nullable();
            $table->boolean('manage_stock')->nullable();
            $table->integer('qty')->nullable();
            $table->boolean('in_stock')->nullable();
            $table->double('rating')->nullable();
            $table->integer('weight')->unsigned();
            $table->integer('Length')->unsigned();
            $table->integer('width')->unsigned();
            $table->integer('height')->unsigned();
            $table->boolean('is_active')->nullable();
            $table->integer('brand_id')->unsigned()->nullable();
            $table->integer('material_id')->unsigned()->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
            $table->foreign('material_id')->references('id')->on('materials')->onDelete('set null');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
