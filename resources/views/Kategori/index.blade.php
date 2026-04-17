<h2>Data Kategori</h2>
<a href="/kategori/tambah">Tambah</a>

<table border="1">
<tr>
    <th>No</th>
    <th>Nama Kategori</th>
    <th>Aksi</th>
</tr>

@foreach($data as $d)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $d->kategori_nama }}</td>
    <td>
        <a href="/kategori/edit/{{ $d->kategori_id }}">Edit</a>
        <a href="/kategori/hapus/{{ $d->kategori_id }}">Hapus</a>
    </td>
</tr>
@endforeach
</table>