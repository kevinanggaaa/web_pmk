<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('type');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('image');
            $table->string('speaker')->nullable();
            $table->string('link')->nullable();
            $table->string('location');
            $table->string('slug')->nullable()->unasigned();
            $table->integer('attendant_count')->default(0);
            $table->text('attendant_id')->nullable();
            $table->text('report')->nullable();
            $table->unsignedBigInteger('creator_id')->nullable()->unasigned();
            $table->string('creator_type')->nullable()->unasigned();
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
        Schema::dropIfExists('events');
    }
}
