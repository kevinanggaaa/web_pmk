<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCounselingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counselings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('counselor_id');
            $table->dateTime('date_time');
            $table->string('topic');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('counselor_id')
                ->references('id')
                ->on('counselors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('counselings');
    }
}
