<h2>Tambah Media</h2>

<form action="/media/simpan" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="judul" placeholder="Judul" required><br>

    <textarea name="deskripsi" placeholder="Deskripsi" required></textarea><br>

    <input type="text" name="jenis_penelitian" placeholder="Jenis Penelitian" required><br>

    <input type="text" name="tahun_terbit" placeholder="Tahun Terbit" required><br>

    <input type="text" name="link_media" placeholder="Link Media"><br>

    <input type="file" name="gambar_media"><br>

    <select name="mahasiswa_id" required>
        <option value="">-- Pilih Mahasiswa --</option>
        @foreach($mahasiswa as $m)
            <option value="{{ $m->mahasiswa_id }}">
                {{ $m->nama_lengkap }}
            </option>
        @endforeach
    </select>
    <br>

    <select name="kategori_id" required>
        <option value="">-- Pilih Kategori --</option>
        @foreach($kategori as $k)
            <option value="{{ $k->kategori_id }}">
                {{ $k->kategori_nama }}
            </option>
        @endforeach
    </select>

    <br>

    <button type="submit">Simpan</button>
</form>