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
        Schema::create('susuts', function (Blueprint $table) {
            $table->id();
            $table->string('ulp');
            $table->date('tanggal');
            $table->decimal('jumlah_susut', 8, 2);
            $table->integer('tahun')->nullable(); // Jika kolom opsional
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('susutpln');
    }
};
