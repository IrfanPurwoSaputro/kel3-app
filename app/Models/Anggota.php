<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';
    protected $primaryKey = 'id_anggota';
    protected $fillable = ['pemesanan_id', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'jenis_identitas', 'no_identitas', 
    'alamat_rumah', 'provinsi_id', 'kabupaten_id', 'no_telepon', 'email', 'surat_sehat', 'created_at'];
}
