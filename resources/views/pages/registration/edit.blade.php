@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Edit Registrasi Siswa Kursus</h4>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('registration.update', $registration->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="tanggal_registrasi" class="form-label">Tanggal Registrasi</label>
                    <input type="date" class="form-control" id="tanggal_registrasi" name="tanggal_registrasi" value="{{ $registration->tanggal_registrasi }}" required>
                </div>
                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $registration->nama_lengkap }}" required>
                </div>
                <div class="mb-3">
                    <label for="nama_panggilan" class="form-label">Nama Panggilan</label>
                    <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan" value="{{ $registration->nama_panggilan }}" required>
                </div>
                <div class="mb-3">
                    <label for="tempat_tgl_lahir" class="form-label">Tempat/Tgl Lahir</label>
                    <input type="text" class="form-control" id="tempat_tgl_lahir" name="tempat_tgl_lahir" value="{{ $registration->tempat_tgl_lahir }}" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $registration->alamat }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="Laki-laki" {{ $registration->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ $registration->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="sekolah_universitas" class="form-label">Sekolah/Universitas</label>
                    <input type="text" class="form-control" id="sekolah_universitas" name="sekolah_universitas" value="{{ $registration->sekolah_universitas }}" required>
                </div>
                <div class="mb-3">
                    <label for="kelas_jurusan" class="form-label">Kelas/Jurusan</label>
                    <input type="text" class="form-control" id="kelas_jurusan" name="kelas_jurusan" value="{{ $registration->kelas_jurusan }}" required>
                </div>
                <div class="mb-3">
                    <label for="no_hp_wa" class="form-label">No. HP/WA</label>
                    <input type="text" class="form-control" id="no_hp_wa" name="no_hp_wa" value="{{ $registration->no_hp_wa }}" required>
                </div>
                <h4 class="mt-4">Identitas Orang Tua/Wali</h4>
                <div class="mb-3">
                    <label for="nama_ayah" class="form-label">Nama Ayah</label>
                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="{{ $registration->nama_ayah }}" required>
                </div>
                <div class="mb-3">
                    <label for="alamat_ayah" class="form-label">Alamat Ayah</label>
                    <textarea class="form-control" id="alamat_ayah" name="alamat_ayah" rows="3" required>{{ $registration->alamat_ayah }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                    <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" value="{{ $registration->pekerjaan_ayah }}" required>
                </div>
                <div class="mb-3">
                    <label for="no_hp_ayah" class="form-label">No. HP Ayah</label>
                    <input type="text" class="form-control" id="no_hp_ayah" name="no_hp_ayah" value="{{ $registration->no_hp_ayah }}" required>
                </div>
                <div class="mb-3">
                    <label for="nama_ibu" class="form-label">Nama Ibu</label>
                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="{{ $registration->nama_ibu }}" required>
                </div>
                <div class="mb-3">
                    <label for="alamat_ibu" class="form-label">Alamat Ibu</label>
                    <textarea class="form-control" id="alamat_ibu" name="alamat_ibu" rows="3" required>{{ $registration->alamat_ibu }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                    <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" value="{{ $registration->pekerjaan_ibu }}" required>
                </div>
                <div class="mb-3">
                    <label for="no_hp_ibu" class="form-label">No. HP Ibu</label>
                    <input type="text" class="form-control" id="no_hp_ibu" name="no_hp_ibu" value="{{ $registration->no_hp_ibu }}" required>
                </div>
                <div class="mb-3">
                    <label for="pilihan_program_bimbel" class="form-label">Pilihan Program Bimbel</label>
                    <select class="form-control" id="pilihan_program_bimbel" name="pilihan_program_bimbel" required>
                        <option value="REGULER" {{ $registration->pilihan_program_bimbel == 'REGULER' ? 'selected' : '' }}>REGULER</option>
                        <option value="PRIVATE" {{ $registration->pilihan_program_bimbel == 'PRIVATE' ? 'selected' : '' }}>PRIVATE</option>
                        <option value="HOME SERVICE" {{ $registration->pilihan_program_bimbel == 'HOME SERVICE' ? 'selected' : '' }}>HOME SERVICE</option>
                        <option value="ENGLISH COURSE" {{ $registration->pilihan_program_bimbel == 'ENGLISH COURSE' ? 'selected' : '' }}>ENGLISH COURSE</option>
                        <option value="JAPANESE COURSE" {{ $registration->pilihan_program_bimbel == 'JAPANESE COURSE' ? 'selected' : '' }}>JAPANESE COURSE</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
    </div>
</div>
<!-- / Content -->
@endsection
