<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodi;
use Illuminate\Support\Facades\Validator;

class ProdiController extends Controller
{
    // ================= WEB =================
    public function index()
    {
        $data = Prodi::all();
        return view('prodi.index', compact('data'));
    }

    public function tambah()
    {
        return view('prodi.tambah');
    }

    public function edit($id)
    {
        $data = Prodi::findOrFail($id);
        return view('prodi.edit', compact('data'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'prodi_nama' => 'required',
            'singkatan' => 'required'
        ]);

        Prodi::create([
            'prodi_nama' => $request->prodi_nama,
            'singkatan' => $request->singkatan
        ]);

        return redirect('/prodi');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_nama' => 'required',
            'singkatan' => 'required'
        ]);

        $data = Prodi::findOrFail($id);
        $data->update([
            'prodi_nama' => $request->prodi_nama,
            'singkatan' => $request->singkatan
        ]);

        return redirect('/prodi');
    }

    public function hapus($id)
    {
        Prodi::destroy($id);
        return redirect('/prodi');
    }

    // ================= API =================

    // GET
    public function getData()
    {
        return response()->json([
            'status' => 'success',
            'data' => Prodi::all()
        ]);
    }

    // POST
    public function storeApi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'prodi_nama' => 'required',
            'singkatan' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = Prodi::create([
            'prodi_nama' => $request->prodi_nama,
            'singkatan' => $request->singkatan
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil tambah data',
            'data' => $data
        ], 201);
    }

    // PUT
    public function updateApi(Request $request, $id)
    {
        $data = Prodi::find($id);

        if (!$data) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $data->update([
            'prodi_nama' => $request->prodi_nama,
            'singkatan' => $request->singkatan
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil update',
            'data' => $data
        ]);
    }

    // DELETE
    public function deleteApi($id)
    {
        $data = Prodi::find($id);

        if (!$data) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $data->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil hapus'
        ]);
    }
}