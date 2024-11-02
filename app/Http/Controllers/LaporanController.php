<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    // Method untuk menampilkan form laporan

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|integer',
            'jenis_id' => 'required|integer',
            'deskripsi' => 'required|string',
            'tanggal_laporan' => 'required|date',
            'media' => 'nullable|array',
            'media.*' => 'file|max:2048',
            'lokasi' => 'required|string|max:255',
        ]);

        $mediaPaths = [];

        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $mediaPaths[] = $file->store('media', 'public');
            }
        }

        $mediaPath = implode(',', $mediaPaths);

        // Simpan laporan ke database
        Pelaporan::create([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'jenis_id' => $request->jenis_id,
            'deskripsi' => $request->deskripsi,
            'tanggal_laporan' => $request->tanggal_laporan,
            'media' => $mediaPath,
            'nama_pelapor' => Auth::user()->name,
            'lokasi' => $request->lokasi,
        ]);

        // Cek data yang akan disimpan
        dd($request->all());

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Laporan berhasil disimpan.');
    }

    // laporan halaman admin
    public function admin(){
        return view('admin.laporan');
    }
}
