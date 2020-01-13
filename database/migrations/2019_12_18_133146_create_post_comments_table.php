<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCommentsTable extends Migration
{
   
    public function up()
    {

        Schema::create("post_comments", function (Blueprint $table) {
            $table->increments("id");
            $table->text("title");
            $table->text("comment");
            $table->enum("approved", [1,0])->default(0);
            $table->integer("post_id")->unsigned();
            $table->integer("user_id")->unsigned();
            $table->timestamps();
            $table->foreign("post_id")->references("id")->on("posts");
            $table->foreign("user_id")->references("id")->on("users");
        });

    }

    public function down()
    {

        Schema::dropIfExists("post_comments");

    }

}