<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->unsigned()->default(0);
            $table->integer('category_id')->index()->unsigned()->default(0)->nullable();
            $table->integer('photo_id')->index()->unsigned()->default(0)->nullable();
            $table->string('title');
            $table->text('body');
            $table->timestamps();

            //"user_id" from table "posts" references "id" in table "users"
            //if we delete a user, all posts from this user will be deleted as well
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
