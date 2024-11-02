<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    protected $fillable = ['name_jenis', 'kategori_id'];
    public function kategori() // Definisikan relasi ke Kategori
    {
        return $this->belongsTo(Kategori::class); // Sesuaikan dengan nama model Kategori
    }
}