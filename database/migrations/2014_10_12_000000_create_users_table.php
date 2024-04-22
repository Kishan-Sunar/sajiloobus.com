<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\UserRole;
use App\Enums\UserStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('full_name', 150);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', UserRole::getValues())->default(UserRole::PASSENGER);
            $table->enum('status', UserStatus::getValues())->default(UserStatus::ACTIVE);
            $table->string('profile_photo_path')->nullable();
            $table->string('provider')->nullable();
            $table->integer('provider_id')->nullable()->unique();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
