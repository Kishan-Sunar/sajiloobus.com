<?php

use App\Enums\SeatStatus;
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
        Schema::create('booked_seats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booked_id');
            $table->unsignedBigInteger('seat_no');
            $table->enum('status', SeatStatus::getValues())->default(SeatStatus::AVAILABLE);
            $table->foreign('seat_no')->references('id')->on('bus_seats')->onDelete('cascade');
            $table->foreign('booked_id')->references('id')->on('bookings')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booked_seats');
    }
};
