<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntriesTable extends Migration
{
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('video')->nullable();
            $table->string('image')->nullable();
            $table->string('background_color');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('entries');
    }
}
