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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('pkk')->nullable();
            $table->string('address')->nullable();
            $table->string('address_origin')->nullable();
            $table->string('phone')->nullable();
            $table->string('parent_phone')->nullable();
            $table->string('line')->nullable();
            $table->date('birthdate');
            $table->string('gender')->nullable();
            $table->string('avatar')->nullable();
            $table->date('date_death')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
