<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('susuts', function (Blueprint $table) {
            $table->dropColumn('tahun'); // Hapus kolom
            // atau
            $table->integer('tahun')->nullable()->change(); // Ubah menjadi nullable
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('susuts', function (Blueprint $table) {
            //
        });
    }
};
