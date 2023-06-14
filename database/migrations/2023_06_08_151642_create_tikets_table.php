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

        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->text('id_tiket');
            $table->unsignedBigInteger('id_penonton')->nullable();
            $table->integer('sts_pemakaian');
            $table->timestamps();
        });

        // Tambahkan foreign key constraint secara terpisah
        Schema::table('tikets', function (Blueprint $table) {
            $table->foreign('id_penonton')
                ->references('id_user')
                ->on('penontons')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};
