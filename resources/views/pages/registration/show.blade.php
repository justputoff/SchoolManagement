@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Detail Registrasi</h5>
        <div class="card-body">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Tanggal Registrasi</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $registration->tanggal_registrasi }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $registration->nama_lengkap }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama Panggilan</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $registration->nama_panggilan }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Tempat/Tgl Lahir</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $registration->tempat_tgl_lahir }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $registration->alamat }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $registration->jenis_kelamin }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Sekolah/Universitas</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $registration->sekolah_universitas }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Kelas/Jurusan</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $registration->kelas_jurusan }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">No. HP/WA</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $registration->no_hp_wa }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama Ayah</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $registration->nama_ayah }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Alamat Ayah</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $registration->alamat_ayah }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Pekerjaan Ayah</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $registration->pekerjaan_ayah }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">No. HP Ayah</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $registration->no_hp_ayah }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Nama Ibu</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $registration->nama_ibu }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Alamat Ibu</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $registration->alamat_ibu }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Pekerjaan Ibu</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $registration->pekerjaan_ibu }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">No. HP Ibu</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $registration->no_hp_ibu }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Pilihan Program Bimbel</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $registration->pilihan_program_bimbel }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 offset-sm-2">
                    <a href="{{ route('registration.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->
@endsection
