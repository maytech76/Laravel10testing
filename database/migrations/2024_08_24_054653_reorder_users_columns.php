
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
        Schema::table('users', function (Blueprint $table) {
            // Agregar solo si la columna no existe
            if (!Schema::hasColumn('users', 'lastname')) {
                $table->string('lastname')->nullable()->after('name');
            }
            
            if (!Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->nullable()->after('lastname');
            }
            
            if (!Schema::hasColumn('users', 'contacto')) {
                $table->string('contacto')->nullable()->after('phone');
            }
            
            if (!Schema::hasColumn('users', 'contactphone')) {
                $table->string('contactphone')->nullable()->after('contacto');
            }
            
            if (!Schema::hasColumn('users', 'status')) {
                $table->integer('status')->default(1)->after('contactphone');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['lastname', 'phone', 'contacto', 'contactphone', 'status']);
        });
    }
};
