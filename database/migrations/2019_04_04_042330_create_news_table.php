<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('name');
            $table->string('description');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('count_views')->default(0);
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->text('content');
            $table->string('picture');
            $table->boolean('status')->default(false);
            $table->boolean('publish')->default(false);
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
        Schema::dropIfExists('news');
    }
}
