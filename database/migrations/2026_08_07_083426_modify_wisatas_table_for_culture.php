<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('wisatas', function (Blueprint $table) {
            $table->dropColumn('harga_tiket');
            $table->string('kategori')->default('Wisata Alam')->after('deskripsi');
        });

        // Update default category for existing records if any
        DB::table('wisatas')->update(['kategori' => 'Wisata Alam']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wisatas', function (Blueprint $table) {
            $table->dropColumn('kategori');
            $table->string('harga_tiket')->nullable();
        });
    }
};
