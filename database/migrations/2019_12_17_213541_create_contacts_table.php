<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    
    public function up()
    {

        Schema::create("contacts", function (Blueprint $table) {
            $table->increments("id");
            $table->text("names");
            $table->text("email");
            $table->text("message");
            $table->integer("user_id")->unsigned()->nullable();
            $table->timestamps();
        });

    }

    public function down()
    {

        Schema::dropIfExists("contacts");

    }

}