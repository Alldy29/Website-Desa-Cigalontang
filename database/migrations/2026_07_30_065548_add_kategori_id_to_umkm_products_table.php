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
            $table->dropColumn('kategori');
            $table->foreignId('kategori_umkm_id')->nullable()->after('harga')->constrained('kategori_umkms')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('umkm_products', function (Blueprint $table) {
            //
        });
    }
};
