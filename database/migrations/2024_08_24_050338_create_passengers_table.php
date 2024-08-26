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
        Schema::create('passengers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('customer_id')
            ->constrained()
            ->onDelete('cascade');

            $table->string('name', 100);
            $table->string('phone', 15);
            $table->string('address', 150);
            $table->string('email', 150);
            $table->string('image_path', 150);
            $table->integer('status')->default(1);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passengers');
    }
};
