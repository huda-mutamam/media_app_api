<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    // WEB

    public function index()
    {
        $data = Kategori::all();
        return view('kategori.index', compact('data'));
    }

    public function tambah()
    {
        return view('kategori.tambah');
    }

    public function edit($id)
    {
        $data = Kategori::findOrFail($id);
        return view('kategori.edit', compact('data'));
    }

    public function simpan(Request $request)
    {
        Kategori::create([
            'kategori_nama' => $request->kategori_nama
        ]);

        return redirect('/kategori');
    }

    public function update(Request $request, $id)
    {
        Kategori::findOrFail($id)->update([
            'kategori_nama' => $request->kategori_nama
        ]);

        return redirect('/kategori');
    }

    public function hapus($id)
    {
        Kategori::destroy($id);
        return redirect('/kategori');
    }

    // API

    public function getData()
    {
        return response()->json([
            'status' => 'success',
            'data' => Kategori::all()
        ]);
    }

    public function storeApi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori_nama' => 'required|unique:kategori,kategori_nama'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = Kategori::create([
            'kategori_nama' => $request->kategori_nama
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil tambah kategori',
            'data' => $data
        ], 201);
    }

    public function updateApi(Request $request, $id)
    {
        $data = Kategori::find($id);

        if (!$data) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $data->update([
            'kategori_nama' => $request->kategori_nama
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil update kategori',
            'data' => $data
        ]);
    }

    public function deleteApi($id)
    {
        $data = Kategori::find($id);

        if (!$data) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $data->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil hapus kategori'
        ]);
    }
} 
