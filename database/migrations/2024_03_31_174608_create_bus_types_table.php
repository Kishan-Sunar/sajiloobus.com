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
        Schema::create('bus_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('model', 200);
            $table->string('company', 255);
            $table->string('type', 200);
            $table->unsignedBigInteger('operator_id');
            $table->foreign("operator_id")->references('id')->on('bus_operators')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_types');
    }
};
