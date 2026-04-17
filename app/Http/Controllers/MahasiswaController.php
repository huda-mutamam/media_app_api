<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Support\Facades\Validator;

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
        return response()->json([
            'status' => 'success',
            'data' => Mahasiswa::with('prodi')->get()
        ]);
    }

    public function storeApi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required|unique:mahasiswa,nim',
            'nama_lengkap' => 'required',
            'prodi_id' => 'required|exists:prodi,prodi_id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = Mahasiswa::create([
            'nim' => $request->nim,
            'nama_lengkap' => $request->nama_lengkap,
            'prodi_id' => $request->prodi_id
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil tambah mahasiswa',
            'data' => $data
        ], 201);
    }

    public function updateApi(Request $request, $id)
    {
        $data = Mahasiswa::find($id);

        if (!$data) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $data->update([
            'nim' => $request->nim,
            'nama_lengkap' => $request->nama_lengkap,
            'prodi_id' => $request->prodi_id
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil update mahasiswa',
            'data' => $data
        ]);
    }

    public function deleteApi($id)
    {
        $data = Mahasiswa::find($id);

        if (!$data) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $data->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil hapus mahasiswa'
        ]);
    }
}