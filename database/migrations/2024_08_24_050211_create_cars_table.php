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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('cartype_id')
                    ->constrained()
                    ->onDelete('cascade');

            $table->foreignId('brand_id')
                    ->constrained()
                    ->onDelete('cascade');

            $table->foreignId('model_car_id')
                    ->constrained()
                    ->onDelete('cascade');

            $table->year('year');
            $table->string('traction', 100);//tipo de traccion
            $table->string('color', 100);
            $table->integer('position');//capacidad de pasajeros
            $table->string('fuel_type', 100);//tipo de combustible
            $table->string('patent', 10)->unique();
            $table->decimal('klm_to_day', 10,2); //kilometraje actual
            $table->date('circulation_end');//Vencimiento de permiso de circulacion
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
        Schema::dropIfExists('cars');
    }
};
