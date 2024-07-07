<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_registrasi',
        'nama_lengkap',
        'nama_panggilan',
        'tempat_tgl_lahir',
        'alamat',
        'jenis_kelamin',
        'sekolah_universitas',
        'kelas_jurusan',
        'no_hp_wa',
        'nama_ayah',
        'alamat_ayah',
        'pekerjaan_ayah',
        'no_hp_ayah',
        'nama_ibu',
        'alamat_ibu',
        'pekerjaan_ibu',
        'no_hp_ibu',
        'pilihan_program_bimbel'
    ];
}
