<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('informes', function (Blueprint $table) {
            $table->string('atencion')->default('no atendido')->change();
        });
        Schema::table('caja', function (Blueprint $table) {
            $table->string('atencion')->default('no atendido')->change();
        });
    }

    public function down(): void
    {
        // No revertimos el cambio porque es solo para permitir el nuevo valor
    }
};
