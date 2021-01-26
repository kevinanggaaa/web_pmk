<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSarjanaStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sarjana_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->string('sarjana');
            $table->string('department');
            $table->integer('year_entry');
            $table->integer('year_graduate')->nullable();
            $table->timestamps();

            $table->foreign('student_id')
                ->references('id')
                ->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sarjana_students');
    }
}
