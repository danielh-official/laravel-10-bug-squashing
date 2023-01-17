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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('social_security_number')->nullable();
            $table->string('drivers_license_number')->nullable();
            $table->string('street')->nullable();
            $table->string('street_two')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('alias_first_name')->nullable();
            $table->string('alias_last_name')->nullable();
            $table->string('work_email')->nullable();
            $table->string('work_phone')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('department_id')->nullable();
            $table->foreignId('role_id')->nullable();
            $table->date('first_started_at')->nullable();
            $table->boolean('is_terminated')->default(false);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
