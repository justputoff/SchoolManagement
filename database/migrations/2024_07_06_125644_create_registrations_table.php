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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_registrasi');
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('tempat_tgl_lahir');
            $table->text('alamat');
            $table->string('jenis_kelamin');
            $table->string('sekolah_universitas');
            $table->string('kelas_jurusan');
            $table->string('no_hp_wa');
            $table->string('nama_ayah');
            $table->text('alamat_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('no_hp_ayah');
            $table->string('nama_ibu');
            $table->text('alamat_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('no_hp_ibu');
            $table->string('pilihan_program_bimbel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
