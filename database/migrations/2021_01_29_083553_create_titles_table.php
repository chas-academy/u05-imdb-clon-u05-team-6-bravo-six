<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
            $table->foreignId('genre_id')->constrained()->onDelete('cascade'); //this is PRIMARY_GENRE
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); //this also?
            // $table->foreignId('title_id')->constrained(); //this is most likely a mistake
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('titles');
    }
}
