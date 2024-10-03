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
    Schema::table('links', function (Blueprint $table) {
        $table->text('url')->change(); // Change to text for longer URLs
    });
}

public function down()
{
    Schema::table('links', function (Blueprint $table) {
        $table->string('url', 255)->change(); // Revert back if needed
    });
}

};
