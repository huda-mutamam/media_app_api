<h2>Tambah Kategori</h2>

<form action="/kategori/simpan" method="POST">
    @csrf

    <input type="text" name="kategori_nama" placeholder="kategory_nama">

    <button type="submit">Simpan</button>
</form>