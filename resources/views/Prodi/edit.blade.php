<h2>Edit Prodi</h2>

<form action="/prodi/update/{{ $data->prodi_id }}" method="POST">
@csrf
<input type="text" name="prodi_nama" value="{{ $data->prodi_nama }}">
<input type="text" name="singkatan" value="{{ $data->singkatan }}">
<button type="submit">Update</button>
</form>