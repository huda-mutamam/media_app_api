<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodi;

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
        Prodi::create([
            'prodi_nama' => $request->prodi_nama
        ]);

        return redirect('/prodi');
    }

    public function update(Request $request, $id)
    {
        $data = Prodi::findOrFail($id);
        $data->update([
            'prodi_nama' => $request->prodi_nama
        ]);

        return redirect('/prodi');
    }

    public function hapus($id)
    {
        Prodi::destroy($id);
        return redirect('/prodi');
    }

    // ================= API =================
    public function getData()
    {
        return response()->json(Prodi::all());
    }

    public function storeApi(Request $request)
    {
        $data = Prodi::create($request->all());

        return response()->json([
            'message' => 'Berhasil tambah data',
            'data' => $data
        ]);
    }

    public function updateApi(Request $request, $id)
    {
        $data = Prodi::findOrFail($id);
        $data->update($request->all());

        return response()->json(['message' => 'Berhasil update']);
    }

    public function deleteApi($id)
    {
        Prodi::destroy($id);

        return response()->json(['message' => 'Berhasil hapus']);
    }
}