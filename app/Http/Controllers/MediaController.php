<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Mahasiswa;
use App\Models\Kategori;

class MediaController extends Controller
{
    // WEB
    public function index()
    {
        $data = Media::with(['mahasiswa','kategori'])->get();
        return view('media.index', compact('data'));
    }

    public function tambah()
    {
        $mahasiswa = Mahasiswa::all();
        $kategori = Kategori::all();
        return view('media.tambah', compact('mahasiswa','kategori'));
    }

    public function edit($id)
    {
        $data = Media::findOrFail($id);
        return view('media.edit', compact('data'));
    }

    public function simpan(Request $request)
{
    Media::create([
        'mahasiswa_id' => $request->mahasiswa_id,
        'kategori_id' => $request->kategori_id,
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'jenis_penelitian' => $request->jenis_penelitian,
        'tahun_terbit' => $request->tahun_terbit,
        'link_media' => $request->link_media,
        'gambar_media' => $request->gambar_media
    ]);

    return redirect('/media');
}

    public function update(Request $request, $id)
    {
        Media::findOrFail($id)->update($request->all());
        return redirect('/media');
    }

    public function hapus($id)
    {
        Media::destroy($id);
        return redirect('/media');
    }

    // API
    public function getData()
    {
        return response()->json(Media::with(['mahasiswa','kategori'])->get());
    }

    public function storeApi(Request $request)
{
    $data = Media::create([
        'mahasiswa_id' => $request->mahasiswa_id,
        'kategori_id' => $request->kategori_id,
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'jenis_penelitian' => $request->jenis_penelitian,
        'tahun_terbit' => $request->tahun_terbit,
        'link_media' => $request->link_media,
        'gambar_media' => $request->gambar_media
    ]);

    return response()->json([
        'message' => 'Berhasil tambah media',
        'data' => $data
    ]);
}

// PUT
public function updateApi(Request $request, $id)
{
    $data = Media::findOrFail($id);
    $data->update($request->all());

    return response()->json([
        'message' => 'Berhasil update media'
    ]);
}

// DELETE
public function deleteApi($id)
{
    Media::destroy($id);

    return response()->json([
        'message' => 'Berhasil hapus media'
    ]);
}
}