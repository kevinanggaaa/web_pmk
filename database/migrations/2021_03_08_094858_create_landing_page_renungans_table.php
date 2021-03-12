<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingPageRenungansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_page_renungans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('lokasiFirman');
            $table->text('isiFirman');
            $table->text('bacaan');
            $table->date('tanggal');
            $table->string('image');
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
        Schema::dropIfExists('landing_page_renungans');
    }
}
