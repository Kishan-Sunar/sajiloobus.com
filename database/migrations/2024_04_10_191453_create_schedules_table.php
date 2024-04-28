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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->unsignedBigInteger('origin');
            $table->dateTime('departure');
            $table->unsignedBigInteger('destination');
            $table->dateTime('arrival');
            $table->string('bus_no');
            $table->longText('policy')->nullable();
            $table->longText('notes')->nullable();
            $table->double("fare");
            $table->foreign('origin')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('destination')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('bus_no')->references('bus_no')->on('buses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
