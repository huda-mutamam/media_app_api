<h2>Data Prodi</h2>
<a href="/prodi/tambah">Tambah</a>

<table border="1">
<tr>
    <th>No</th>
    <th>Nama Prodi</th>
    <th>Aksi</th>
</tr>

@foreach($data as $d)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $d->prodi_nama }}</td>
    <td>
        <a href="/prodi/edit/{{ $d->prodi_id }}">Edit</a>
        <a href="/prodi/hapus/{{ $d->prodi_id }}">Hapus</a>
    </td>
</tr>
@endforeach
</table>