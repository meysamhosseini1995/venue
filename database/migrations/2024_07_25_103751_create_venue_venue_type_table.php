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
        Schema::create('venue_venue_type', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('venue_id');
            $table->unsignedBiginteger('venue_type_id');

            $table->foreign('venue_id')->references('id')
                ->on('venues')->onDelete('cascade');
            $table->foreign('venue_type_id')->references('id')
                ->on('venue_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venue_venue_type');
    }
};
