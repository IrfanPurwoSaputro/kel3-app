<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    protected $fillable = ['jalur_id', 'kode', 'tanggal_naik', 'tanggal_turun', 'status', 'total_harga', 'created_at'];

    public function anggota()
    {
        return $this->hasMany(Anggota::class, 'pemesanan_id', 'id_pemesanan');
    }

    public function jalur()
    {
        return $this->belongsTo(Jalur::class, 'jalur_id');
    }
}
