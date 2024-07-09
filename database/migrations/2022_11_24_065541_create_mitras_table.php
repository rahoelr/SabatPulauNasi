<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitras', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('mitra_name', 200);
            $table->string('owner', 200);
            $table->string('t_o_business', 200);
            $table->string('address', 200)->nullable(); // Tambahkan nullable()
            $table->string('desa', 200); // Tambahkan kolom 'desa'
            $table->string('kecamatan', 200); // Tambahkan kolom 'kecamatan'
            $table->string('images')->nullable(); // Tambahkan nullable()
            // $table->foreignId('userId')->constrained('users'); // Tambahkan kolom 'userId'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mitras');
    }
};
