<?php

use App\Enums\BookingStatus;
use App\Enums\PaymentStatus;
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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booked_by');
            $table->unsignedBigInteger('schedule_id');
            $table->string('passenger_name', 200);
            $table->string('passenger_email', 200);
            $table->string('passenger_phone', 20);
            $table->unsignedBigInteger('board_point');
            $table->unsignedBigInteger('drop_point');
            $table->longText('comments');
            $table->double('total_amount', 8, 2);
            $table->string('payment_method', 100);
            $table->dateTime('payment_date');
            $table->enum('payment_status', PaymentStatus::getValues())->default(PaymentStatus::PENDING);
            $table->enum('status', BookingStatus::getValues())->default(BookingStatus::PENDING);
            $table->foreign('schedule_id')->references('id')->on('schedules')->onDelete('cascade');
            $table->foreign('booked_by')->references('id')->on('passengers')->onDelete('cascade');
            $table->foreign('board_point')->references('id')->on('route_points')->onDelete('cascade');
            $table->foreign('drop_point')->references('id')->on('route_points')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
