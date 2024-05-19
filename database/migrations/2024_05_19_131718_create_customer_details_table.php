<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customer_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('plan_id')->constrained()->onDelete('cascade');
            $table->string('order_number')->unique();
            $table->decimal('price', 10, 2);
            $table->timestamp('purchase_date');
            $table->timestamp('subscription_date');
            $table->timestamp('renewal_date');
            $table->string('user_name');
            $table->string('user_email');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customer_details');
    }
};
