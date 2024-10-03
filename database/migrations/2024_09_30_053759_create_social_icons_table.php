<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_icons', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the social platform (e.g., Facebook, Twitter)
            $table->string('icon'); // Icon class or path (can be Font Awesome class or image path)
            $table->string('url'); // Link to the social platform
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
        Schema::dropIfExists('social_icons');
    }
};
