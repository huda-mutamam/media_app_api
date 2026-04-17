<h2>Edit Media</h2>

<form action="/media/update/{{ $data->media_id }}" method="POST">
@csrf
<input type="text" name="judul" value="{{ $data->judul }}"><br>
<input type="text" name="tahun_terbit" value="{{ $data->tahun_terbit }}"><br>

<button type="submit">Update</button>
</form>