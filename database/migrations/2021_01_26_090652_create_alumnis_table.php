<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('department');
            $table->integer('year_entry')->nullable();
            $table->integer('year_graduate')->nullable();
            $table->string('phone');
            $table->string('job')->nullable();
            $table->string('gender');
            $table->string('address')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('year_end')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnis');
    }
}
