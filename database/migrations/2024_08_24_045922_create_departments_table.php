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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('customer_id')
            ->constrained('customers')
            ->onDelete('cascade');

            $table->foreignId('coordinator_id')
            ->constrained('coordinators')
            ->onDelete('cascade');

            $table->string('name', 150);
            $table->string('phone', 50);
            $table->string('email', 100);
            $table->string('image_path', 250);
            $table->integer('status')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
