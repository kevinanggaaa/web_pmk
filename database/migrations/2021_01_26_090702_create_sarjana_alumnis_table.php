<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSarjanaAlumnisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sarjana_alumnis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumni_id');
            $table->string('sarjana');
            $table->string('department');
            $table->integer('year_entry')->nullable();
            $table->integer('year_graduate')->nullable();
            $table->timestamps();

            $table->foreign('alumni_id')
                ->references('id')
                ->on('alumnis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sarjana_alumnis');
    }
}
