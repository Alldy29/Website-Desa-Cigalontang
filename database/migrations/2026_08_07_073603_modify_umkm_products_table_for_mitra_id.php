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
        Schema::table('umkm_products', function (Blueprint $table) {
            $table->dropColumn('mitra');
            $table->foreignId('mitra_umkm_id')->nullable()->constrained('mitra_umkms')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('umkm_products', function (Blueprint $table) {
            $table->dropForeign(['mitra_umkm_id']);
            $table->dropColumn('mitra_umkm_id');
            $table->string('mitra')->nullable();
        });
    }
};
