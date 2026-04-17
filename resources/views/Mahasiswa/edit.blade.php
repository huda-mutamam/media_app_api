<h2>Edit Mahasiswa</h2>

<form action="/mahasiswa/update/{{ $data->mahasiswa_id }}" method="POST">
@csrf
<input type="text" name="nim" value="{{ $data->nim }}"><br>
<input type="text" name="nama_lengkap" value="{{ $data->nama_lengkap }}"><br>
<input type="text" name="kelas" value="{{ $data->kelas }}"><br>

<select name="prodi_id">
@foreach($prodi as $p)
<option value="{{ $p->prodi_id }}" {{ $data->prodi_id == $p->prodi_id ? 'selected' : '' }}>
    {{ $p->nama_prodi }}
</option>
@endforeach
</select>

<button type="submit">Update</button>
</form>