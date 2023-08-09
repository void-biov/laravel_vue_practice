<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
        Schema::table('listings', function (Blueprint $table) {
            $table->unsignedInteger('location_id'); // Foreign key

            $table->foreign('location_id', 'property_location')
            ->references('id')
            ->on('locations')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('listings', function (Blueprint $table) {
            $table->dropIndex('property_location'); // Foreign key
            $table->dropColumn('location_id');
        });
        Schema::dropIfExists('locations');
    }
};
