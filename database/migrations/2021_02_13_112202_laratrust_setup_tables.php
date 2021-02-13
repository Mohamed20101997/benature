<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LaratrustSetupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        // Create table for storing roles
        Schema::create('', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for storing permissions
        Schema::create('', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for associating roles to users and teams (Many To Many Polymorphic)
        Schema::create('', function (Blueprint $table) {
            $table->unsignedBigInteger('');
            $table->unsignedBigInteger('');
            $table->string('user_type');

            $table->foreign('')->references('id')->on('')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['', '', 'user_type']);
        });

        // Create table for associating permissions to users (Many To Many Polymorphic)
        Schema::create('', function (Blueprint $table) {
            $table->unsignedBigInteger('');
            $table->unsignedBigInteger('');
            $table->string('user_type');

            $table->foreign('')->references('id')->on('')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['', '', 'user_type']);
        });

        // Create table for associating permissions to roles (Many-to-Many)
        Schema::create('', function (Blueprint $table) {
            $table->unsignedBigInteger('');
            $table->unsignedBigInteger('');

            $table->foreign('')->references('id')->on('')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('')->references('id')->on('')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['', '']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::dropIfExists('');
        Schema::dropIfExists('');
        Schema::dropIfExists('');
        Schema::dropIfExists('');
        Schema::dropIfExists('');
    }
}
