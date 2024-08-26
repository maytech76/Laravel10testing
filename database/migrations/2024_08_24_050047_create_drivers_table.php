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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('license_id')
            ->constrained()
            ->onDelete('cascade');

            $table->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade');
         

            $table->string('run');
            $table->string('name', 100);//nombre
            $table->string('last_name', 100);//Apellidos
            $table->date('birth');//fecha de nacimiento
            $table->string('address', 250);
            $table->string('phone', 20);
            $table->string('email', 100);
            $table->string('contact', 100)->nullable();
            $table->string('contact_phone', 20)->nullable();
            $table->string('bank_details', 250)->nullable();
            $table->date('license_end');// fecha de vencimiento de licencia de conducir
            $table->string('blood_type', 100);//tipo de sangre
            $table->string('pathology', 250);
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
