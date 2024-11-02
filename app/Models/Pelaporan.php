<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelaporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'kategori_id',
        'jenis_id',
        'deskripsi',
        'tanggal_laporan',
        'media',
        'nama_pelapor',
        'lokasi',
    ];
}