<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateVideosTable extends Migration
{
  public function up()
  {
    Schema::create('videos', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('title');
      $table->string('video');
      $table->timestamps();
  });
  }
  public function down()
  {
    Schema::dropIfExists('videos');
  }
}