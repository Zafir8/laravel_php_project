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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->string('number')->nullable();
            $table->string('engine_number')->nullable();
            $table->string('chassis_number')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_nic')->nullable();
            $table->string('owner_license')->nullable();
            $table->string('owner_address')->nullable();
            $table->string('owner_mobile')->nullable();
            $table->enum('status', [
                'active',
                'inactive',
                'under_maintanance'
            ])->nullable(); // active, inactive, under_maintanance

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
