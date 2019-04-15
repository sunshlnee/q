<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFabricsTable extends Migration
{
    public function up()
    {
        Schema::create('fabrics', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title', 255);
        });
    }

    public function down()
    {
        Schema::dropIfExists('fabrics');
    }
}
