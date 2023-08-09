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
        Schema::create('listing_type', function (Blueprint $table) {
            $table->unsignedInteger('listing_id');
            $table->unsignedInteger('type_id');
            $table->foreign('listing_id', 'listing__listing_type')
            ->references('id')
            ->on('listings')
            ->onDelete('cascade');
            $table->foreign('type_id', 'listing_type__type')
            ->references('id')
            ->on('types')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing_type');
    }
};
