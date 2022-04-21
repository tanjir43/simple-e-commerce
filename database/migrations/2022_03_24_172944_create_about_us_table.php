<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->nullable();
            $table->longText('content')->nullable();
            $table->string('bg_image')->nullable();
            $table->string('signature')->nullable();
            $table->integer('happy_customer')->default(500);
            $table->integer('experience')->default(3);
            $table->integer('return_clients')->default(50);
            $table->integer('awards')->default(3);
            $table->string('photo')->nullable();
            $table->string('full_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('brand_photo')->nullable();
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
        Schema::dropIfExists('about_us');
    }
}
