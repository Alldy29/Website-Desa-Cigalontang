
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
        Schema::table('paket_wisatas', function (Blueprint $table) {
            $table->renameColumn('kontak_pemesanan', 'link_pemesanan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paket_wisatas', function (Blueprint $table) {
            $table->renameColumn('link_pemesanan', 'kontak_pemesanan');
        });
    }
};
