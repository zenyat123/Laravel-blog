<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    public function up()
    {

        Schema::create("users", function (Blueprint $table) {
            $table->increments("id");
            $table->text("name");
            $table->text("surname");
            $table->string("email")->unique();
            $table->timestamp("email_verified_at")->nullable();
            $table->text("password");
            $table->integer("rol_id")->unsigned();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign("rol_id")->references("id")->on("rols");
        });

    }

    public function down()
    {

        Schema::dropIfExists("users");

    }

}