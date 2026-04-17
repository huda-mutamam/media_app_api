<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>

    <!-- FIX CSS BIAR TEKS TIDAK HILANG -->
    <style>
        select, option, input {
            color: black !important;
            background-color: white !important;
        }

        body {
            font-family: Arial, sans-serif;
        }

        form {
            width: 300px;
            margin-top: 20px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        button {
            padding: 8px;
            width: 100%;
            background: blue;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background: darkblue;
        }
    </style>
</head>
<body>

<h2>Tambah Mahasiswa</h2>

<form action="/mahasiswa/simpan" method="POST">
    @csrf

    <input type="text" name="nim" placeholder="NIM" required>

    <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required>

    <select name="prodi_id" required>
        <option value="">-- Pilih Prodi --</option>

        @foreach($prodi as $p)
            <option value="{{ $p->prodi_id }}">
                {{ $p->prodi_nama }}
            </option>
        @endforeach
    </select>

    <button type="submit">Simpan</button>
</form>

</body>
</html>