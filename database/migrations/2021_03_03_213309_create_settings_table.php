<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->string('facebook');
            $table->string('gmail');
            $table->string('whatsapp');

            $table->string('image1');
            $table->string('label1');

            $table->string('image2');
            $table->string('label2');

            $table->string('image3');
            $table->string('label3');

            $table->string('image4');
            $table->string('label4');

            $table->string('header');
            $table->string('title');
            $table->string('description');


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
        Schema::dropIfExists('settings');
    }
}
