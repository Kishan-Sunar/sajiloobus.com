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
        Schema::create('bus_amenities', function (Blueprint $table) {
            $table->string('bus_no');
            $table->foreign("bus_no")->references('bus_no')->on('buses')->onDelete('cascade');
            $table->unsignedBigInteger('amenity_id');
            $table->foreign("amenity_id")->references('id')->on('amenities')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_amenities');
    }
};
