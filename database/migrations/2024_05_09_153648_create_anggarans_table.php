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
        Schema::create('anggarans', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Acara', 'Konsumsi', 'Perkap', 'Sekertaris', 'Lain - lain']);
            $table->string('name');
            $table->integer('satuan');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->date('date');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggarans');
    }
};
