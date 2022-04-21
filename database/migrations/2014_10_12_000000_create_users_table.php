<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('photo')->nullable();
            $table->string('phone')->nullable();
            $table->enum('status',['active','inactive'])->default('active');

            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->integer('postcode')->nullable();
            $table->string('state')->nullable();
            $table->text('address')->nullable();

            $table->string('scountry')->nullable();
            $table->string('scity')->nullable();
            $table->integer('spostcode')->nullable();
            $table->string('sstate')->nullable();
            $table->text('saddress')->nullable();

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
        Schema::dropIfExists('users');
    }
}
