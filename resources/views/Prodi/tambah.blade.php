<h2>Tambah Prodi</h2>

<form action="/prodi/simpan" method="POST">
@csrf
<input type="text" name="prodi_nama" placeholder="prodi_nama">
<input type="text" name="singkatan" placeholder="Singkatan">
<button type="submit">Simpan</button>
</form>