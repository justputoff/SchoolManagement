<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::all();
        return view('pages.registration.index', compact('registrations'));
    }

    public function create()
    {
        return view('registration');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_registrasi' => 'required|date',
            'nama_lengkap' => 'required|string|max:255',
            'nama_panggilan' => 'required|string|max:255',
            'tempat_tgl_lahir' => 'required|string|max:255',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'sekolah_universitas' => 'required|string|max:255',
            'kelas_jurusan' => 'required|string|max:255',
            'no_hp_wa' => 'required|string|max:15',
            'nama_ayah' => 'required|string|max:255',
            'alamat_ayah' => 'required|string',
            'pekerjaan_ayah' => 'required|string|max:255',
            'no_hp_ayah' => 'required|string|max:15',
            'nama_ibu' => 'required|string|max:255',
            'alamat_ibu' => 'required|string',
            'pekerjaan_ibu' => 'required|string|max:255',
            'no_hp_ibu' => 'required|string|max:15',
            'pilihan_program_bimbel' => 'required|string'
        ]);

        Registration::create($request->all());

        return back()->with('success', 'Registrasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $registration = Registration::findOrFail($id);
        return view('pages.registration.edit', compact('registration'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_registrasi' => 'required|date',
            'nama_lengkap' => 'required|string|max:255',
            'nama_panggilan' => 'required|string|max:255',
            'tempat_tgl_lahir' => 'required|string|max:255',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'sekolah_universitas' => 'required|string|max:255',
            'kelas_jurusan' => 'required|string|max:255',
            'no_hp_wa' => 'required|string|max:15',
            'nama_ayah' => 'required|string|max:255',
            'alamat_ayah' => 'required|string',
            'pekerjaan_ayah' => 'required|string|max:255',
            'no_hp_ayah' => 'required|string|max:15',
            'nama_ibu' => 'required|string|max:255',
            'alamat_ibu' => 'required|string',
            'pekerjaan_ibu' => 'required|string|max:255',
            'no_hp_ibu' => 'required|string|max:15',
            'pilihan_program_bimbel' => 'required|string'
        ]);

        $registration = Registration::findOrFail($id);
        $registration->update($request->all());

        return redirect()->route('registration.index')->with('success', 'Registrasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $registration = Registration::findOrFail($id);
        $registration->delete();
        return redirect()->route('registration.index')->with('success', 'Registrasi berhasil dihapus');
    }

    public function show($id)
    {
        $registration = Registration::findOrFail($id);
        return view('pages.registration.show', compact('registration'));
    }
}