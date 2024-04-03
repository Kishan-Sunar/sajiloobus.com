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
        Schema::create('bus_schedules', function (Blueprint $table) {
            $table->id();
            $table->string("name", 200);
            $table->string("start_point", 200);
            $table->dateTime("departure_time");
            $table->string("end_point", 200);
            $table->dateTime("arrival_time");
            $table->string("fare", 200);
            $table->longText("notes");
            $table->integer("bus_id");
            $table->foreign("bus_id")->references('id')->on('buses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_schedules');
    }
};
