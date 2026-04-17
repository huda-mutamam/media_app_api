<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Mahasiswa;
use App\Models\Kategori;


class Media extends Model
{
    use HasFactory;

    protected $table = 'media';

    protected $primaryKey = 'media_id';

    protected $fillable = [
        'mahasiswa_id',
        'kategori_id',
        'judul',
        'deskripsi',
        'jenis_penelitian',
        'tahun_terbit',
        'link_media',
        'gambar_media',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'mahasiswa_id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'kategori_id');
    }
}
