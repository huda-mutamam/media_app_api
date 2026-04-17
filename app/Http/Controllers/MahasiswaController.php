<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Prodi;

class MahasiswaController extends Controller
{
    // WEB
    public function index()
    {
        $data = Mahasiswa::with('prodi')->get();
        return view('mahasiswa.index', compact('data'));
    }

    public function tambah()
    {
        $prodi = Prodi::all();
        return view('mahasiswa.tambah', compact('prodi'));
    }

    public function edit($id)
    {
        $data = Mahasiswa::findOrFail($id);
        $prodi = Prodi::all();
        return view('mahasiswa.edit', compact('data','prodi'));
    }

    public function simpan(Request $request)
{
    Mahasiswa::create([
        'nim' => $request->nim,
        'nama_lengkap' => $request->nama_lengkap,
        'prodi_id' => $request->prodi_id
    ]);

    return redirect('/mahasiswa');
}

    public function update(Request $request, $id)
{
    Mahasiswa::findOrFail($id)->update([
        'nim' => $request->nim,
        'nama_lengkap' => $request->nama_lengkap,
        'prodi_id' => $request->prodi_id
    ]);

    return redirect('/mahasiswa');
}

    public function hapus($id)
    {
        Mahasiswa::destroy($id);
        return redirect('/mahasiswa');
    }

    // API
    public function getData()
    {
        return response()->json(Mahasiswa::with('prodi')->get());
    }
}