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
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->uuid('ck_settings_id');
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->char('gender', 1);
            $table->text('address')->nullable();
            $table->string('position', 100)->nullable();
            $table->string('status', 50)->nullable(); // Tambahkan ini jika ingin ada status
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ck_settings_id')->references('id')->on('check_clock_settings')->onDelete('set null');
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
