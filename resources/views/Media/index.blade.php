<h2>Data Media</h2>
<a href="/media/tambah">Tambah</a>

<table border="1">
<tr>
    <th>No</th>
    <th>Judul</th>
    <th>Mahasiswa</th>
    <th>Jenis Penelitian</th>
    <th>Tahun</th>
    <th>Kategori</th>
    <th>Link Media</th>
    <th>Gambar Media</th>
    <th>Aksi</th>
</tr>

@foreach($data as $d)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $d->judul }}</td>
    <td>{{ $d->mahasiswa->nama_lengkap }}</td>
    <td>{{ $d->jenis_penelitian }}</td>
    <td>{{ $d->tahun_terbit }}</td>
    <td>{{ $d->kategori->kategori_nama }}</td>
    <td>{{ $d->link_media }}</td>
    <td>{{ $d->gambar_media }}</td>
    <td>
        <a href="/media/edit/{{ $d->media_id }}">Edit</a>
        <a href="/media/hapus/{{ $d->media_id }}">Hapus</a>
    </td>
</tr>
@endforeach
</table>