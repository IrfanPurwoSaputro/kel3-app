<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jalur extends Model
{
    use HasFactory;

    protected $table = 'jalur';
    protected $primaryKey = 'id_jalur';

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
