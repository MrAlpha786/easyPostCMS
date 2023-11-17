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
        Schema::create('couriers', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('tracking_number', 16);
            $table->string('sender_name', 100);
            $table->text('sender_address');
            $table->string('sender_contact', 20);
            $table->string('sender_pincode', 10);
            $table->string('recipient_name', 100);
            $table->text('recipient_address');
            $table->string('recipient_contact', 20);
            $table->string('recipient_pincode', 10);
            $table->decimal('weight', 8, 2, true);
            $table->decimal('height', 8, 2, true);
            $table->decimal('width', 8, 2, true);
            $table->decimal('length', 8, 2, true);
            $table->decimal('price', 8, 2);
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('couriers');
    }
};
