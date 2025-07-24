<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('app_sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('daerah_id');

            $table->foreign('daerah_id')
                ->references('id')
                ->on('daerahs')
                ->onDelete('cascade');

            $table->string('logo_app');
            $table->string('nama_app');
            $table->string('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_sections');
    }
};
