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

    public function provinsi()
    {
        return $this->belongsTo(Province::class, 'provinsi_id');
    }

    public function kabupaten()
    {
        return $this->belongsTo(Cities::class, 'kabupaten_id');
    }

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'pemesanan_id', 'id_pemesanan');
    }
}
