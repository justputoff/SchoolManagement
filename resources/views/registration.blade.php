<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Siswa Kursus</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            font-size: 14px;
            line-height: 1.5;
            color: #24292e;
            background-color: #f6f8fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-label {
            font-weight: 600;
        }
        .form-control {
            border-radius: 4px;
        }
        .btn-primary {
            background-color: #2c974b;
            border-color: #2c974b;
        }
        .btn-primary:hover {
            background-color: #267a3e;
            border-color: #267a3e;
        }
        .alert {
        position: fixed;
        top: 50px;
        right: 50%;
        transform: translateX(50%);
        width: max-content;
        z-index: 9999;
        padding: 1rem 1.5rem;
        border-radius: 0.375rem;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
      }
      .alert .btn-close {
        margin-left: 20px; /* Tambahkan margin kiri */
      }
        .important-notes {
            margin-top: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
        }
        .important-notes h5 {
            font-weight: bold;
        }
        .important-notes ul {
            list-style-type: disc;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" id="alert" role="alert">
      <h5 class="text-black">{{ $message }}</h5>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="container">
        <h2 class="text-center mb-4">Formulir Pendaftaran Siswa Kursus</h2>
        <form action="{{ route('registration.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tanggal_registrasi" class="form-label">Tanggal Registrasi</label>
                <input type="date" class="form-control" id="tanggal_registrasi" name="tanggal_registrasi" value="{{ date('Y-m-d') }}" required>
            </div>
            <div class="form-group">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
            </div>
            <div class="form-group">
                <label for="nama_panggilan" class="form-label">Nama Panggilan</label>
                <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan" required>
            </div>
            <div class="form-group">
                <label for="tempat_tgl_lahir" class="form-label">Tempat/Tgl Lahir</label>
                <input type="text" class="form-control" id="tempat_tgl_lahir" name="tempat_tgl_lahir" required>
            </div>
            <div class="form-group">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="sekolah_universitas" class="form-label">Sekolah/Universitas</label>
                <input type="text" class="form-control" id="sekolah_universitas" name="sekolah_universitas" required>
            </div>
            <div class="form-group">
                <label for="kelas_jurusan" class="form-label">Kelas/Jurusan</label>
                <input type="text" class="form-control" id="kelas_jurusan" name="kelas_jurusan" required>
            </div>
            <div class="form-group">
                <label for="no_hp_wa" class="form-label">No. HP/WA</label>
                <input type="text" class="form-control" id="no_hp_wa" name="no_hp_wa" required>
            </div>
            <h4 class="mt-4">Identitas Orang Tua/Wali</h4>
            <div class="form-group">
                <label for="nama_ayah" class="form-label">Nama Ayah</label>
                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" required>
            </div>
            <div class="form-group">
                <label for="alamat_ayah" class="form-label">Alamat Ayah</label>
                <textarea class="form-control" id="alamat_ayah" name="alamat_ayah" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" required>
            </div>
            <div class="form-group">
                <label for="no_hp_ayah" class="form-label">No. HP Ayah</label>
                <input type="text" class="form-control" id="no_hp_ayah" name="no_hp_ayah" required>
            </div>
            <div class="form-group">
                <label for="nama_ibu" class="form-label">Nama Ibu</label>
                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" required>
            </div>
            <div class="form-group">
                <label for="alamat_ibu" class="form-label">Alamat Ibu</label>
                <textarea class="form-control" id="alamat_ibu" name="alamat_ibu" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" required>
            </div>
            <div class="form-group">
                <label for="no_hp_ibu" class="form-label">No. HP Ibu</label>
                <input type="text" class="form-control" id="no_hp_ibu" name="no_hp_ibu" required>
            </div>
            <div class="form-group">
                <label for="pilihan_program_bimbel" class="form-label">Pilihan Program Bimbel</label>
                <select class="form-control" id="pilihan_program_bimbel" name="pilihan_program_bimbel" required>
                    <option value="ENGLISH COURSE - REGULAR">ENGLISH COURSE - REGULAR</option>
                    <option value="ENGLISH COURSE - PRIVATE">ENGLISH COURSE - PRIVATE</option>
                    <option value="ENGLISH COURSE - HOME SERVICE">ENGLISH COURSE - HOME SERVICE</option>
                    <option value="JAPANESE COURSE - REGULAR">JAPANESE COURSE - REGULAR</option>
                    <option value="JAPANESE COURSE - PRIVATE">JAPANESE COURSE - PRIVATE</option>
                    <option value="JAPANESE COURSE - HOME SERVICE">JAPANESE COURSE - HOME SERVICE</option>
                    <option value="CALISTUNG - REGULAR">CALISTUNG - REGULAR</option>
                    <option value="CALISTUNG - PRIVATE">CALISTUNG - PRIVATE</option>
                    <option value="CALISTUNG - HOME SERVICE">CALISTUNG - HOME SERVICE</option>
                    <option value="BIMBEL (SD-SMP-SMA) - REGULAR">BIMBEL (SD-SMP-SMA) - REGULAR</option>
                    <option value="BIMBEL (SD-SMP-SMA) - PRIVATE">BIMBEL (SD-SMP-SMA) - PRIVATE</option>
                    <option value="BIMBEL (SD-SMP-SMA) - HOME SERVICE">BIMBEL (SD-SMP-SMA) - HOME SERVICE</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>

        <!-- Catatan Penting -->
        <div class="important-notes">
            <h5>Catatan Penting:</h5>
            <ul>
                <li>Refund biaya yang telah dibayarkan bisa dilakukan jika siswa belum mulai belajar/mengikuti program: refund dana sebesar 75% dari yang telah dibayarkan.</li>
                <li>Refund biaya yang telah dibayarkan tidak bisa dilakukan, apabila siswa telah mulai belajar/mengikuti program.</li>
                <li>Biaya pendaftaran 50.000</li>
                <li>Biaya buku 35.000, 40.000, 45.000, 50.000</li>
            </ul>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
