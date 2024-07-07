@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('registration.create') }}" class="btn btn-primary btn-sm">Tambah Registrasi</a>
        </div>
    </div>
    <div class="card mt-2">
        <h5 class="card-header">Daftar Registrasi Siswa Kursus</h5>
        <div class="table-responsive text-nowrap p-3">
            <table class="table" id="example">
                <thead>
                    <tr class="text-nowrap table-dark">
                        <th class="text-white">No</th>
                        <th class="text-white">Nama Lengkap</th>
                        <th class="text-white">Nama Panggilan</th>
                        <th class="text-white">Jenis Kelamin</th>
                        <th class="text-white">Sekolah/Universitas</th>
                        <th class="text-white">Kelas/Jurusan</th>
                        <th class="text-white">No. HP/WA</th>
                        <th class="text-white">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registrations as $registration)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $registration->nama_lengkap }}</td>
                        <td>{{ $registration->nama_panggilan }}</td>
                        <td>{{ $registration->jenis_kelamin }}</td>
                        <td>{{ $registration->sekolah_universitas }}</td>
                        <td>{{ $registration->kelas_jurusan }}</td>
                        <td>{{ $registration->no_hp_wa }}</td>
                        <td>
                            <a href="{{ route('registration.edit', $registration->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('registration.show', $registration->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <form action="{{ route('registration.destroy', $registration->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- / Content -->
@endsection
