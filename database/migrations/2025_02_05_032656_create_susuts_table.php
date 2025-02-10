<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('susuts', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('tahun');
            $table->integer('bulan');
            $table->decimal('jumlah_susut', 8, 2);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('susuts');
    }
};
