<h2>Edit Kategori</h2>

<form action="/kategori/update/{{ $data->kategori_id }}" method="POST">
@csrf
<input type="text" name="kategori_nama" value="{{ $data->kategori_nama }}">
<button type="submit">Update</button>
</form>