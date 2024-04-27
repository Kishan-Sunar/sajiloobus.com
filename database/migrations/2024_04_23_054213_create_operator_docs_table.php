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
        Schema::create('operator_docs', function (Blueprint $table) {
            $table->id();
            $table->string('doc_type')->nullable();
            $table->longText('doc_url')->nullable();
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
        Schema::dropIfExists('operator_docs');
    }
};
