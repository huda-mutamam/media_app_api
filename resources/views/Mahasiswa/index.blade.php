<h2>Data Mahasiswa</h2>
<a href="/mahasiswa/tambah">Tambah</a>

<table border="1">
<tr>
    <th>No</th>
    <th>NIM</th>
    <th>Nama</th>
    <th>Prodi</th>
    <th>Aksi</th>
</tr>

@foreach($data as $d)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $d->nim }}</td>
    <td>{{ $d->nama_lengkap }}</td>
    <td>{{ $d->prodi->prodi_id }}</td>
    <td>
        <a href="/mahasiswa/edit/{{ $d->mahasiswa_id }}">Edit</a>
        <a href="/mahasiswa/hapus/{{ $d->mahasiswa_id }}">Hapus</a>
    </td>
</tr>
@endforeach
</table>