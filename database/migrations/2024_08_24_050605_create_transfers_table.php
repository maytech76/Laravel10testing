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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('department_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('car_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('driver_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('passenger_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('city_origin_id') // Ciudad de origen
                ->constrained('cities')
                ->onDelete('cascade');

            $table->foreignId('city_destination_id') // Ciudad de destino
                ->constrained('cities')
                ->onDelete('cascade');

            $table->decimal('klm_star', 8, 2); // Kilometraje al inicio
            $table->decimal('klm_end', 8, 2)->nullable(); // Kilometraje al final, puede ser nulo inicialmente

            $table->time('time_star'); // Hora y minutos de inicio
            $table->time('time_end')->nullable(); // Hora y minutos de final, puede ser nulo inicialmente

            $table->text('observations')->nullable(); // Indicar ruta e indicaciones detalladas, puede ser nulo inicialmente

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfers');
    }
};
