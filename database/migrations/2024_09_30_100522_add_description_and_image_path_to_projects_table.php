<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionAndImagePathToProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->text('description')->after('name'); // Add description
            $table->string('image_path')->nullable()->after('description'); // Add image_path
        });
    }

    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['description', 'image_path']); // Remove the columns if rolled back
        });
    }
}

