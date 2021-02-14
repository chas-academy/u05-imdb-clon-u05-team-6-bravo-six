<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('comment');
            $table->timestamps();
            $table->increments('id');
            $table->integer('review_id')->unsigned();;
            $table->foreignId('user_id')->constrained();

        });
        Schema::table('comments', function ($table) {
            $table->foreignId('review_id')->
            references('id')->on('review')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
//        Schema::dropForeign('[review_id]);
    }
}
