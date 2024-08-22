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
        Schema::create('companies', function (Blueprint $table) {

            $table->id();
            $table->string('rut', 15)->unique();
            $table->string('name', 150);
            $table->foreignId('city_id')
                  ->constrained()
                  ->onDelete('cascade');
            $table->string('address', 250);
            $table->string('web', 150)->nullable();;
            $table->string('phone');
            $table->string('email', 150)->nullable();;
            $table->string('manager');
            $table->string('image_path')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
