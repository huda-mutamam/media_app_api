<h2>Edit Prodi</h2>

<form action="/prodi/update/{{ $data->prodi_id }}" method="POST">
@csrf
<input type="text" name="prodi_nama" value="{{ $data->prodi_nama }}">
<button type="submit">Update</button>
</form>