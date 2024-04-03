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
        Schema::create('buses', function (Blueprint $table) {
            $table->string('bus_no',20)->primary();
            $table->string('name', 255);
            $table->longText('featured_photo_path');
            $table->unsignedBigInteger('operator_id');
            $table->unsignedBigInteger('bus_type');
            $table->foreign("operator_id")->references('id')->on('bus_operators')->onDelete('cascade');
            $table->foreign("bus_type")->references('id')->on('bus_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buses');
    }
};
