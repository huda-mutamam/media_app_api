<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

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
        Kategori::findOrFail($id)->update($request->all());
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
        return response()->json(Kategori::all());
    }
}