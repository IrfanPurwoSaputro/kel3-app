<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;

    protected $table = 'indonesia_cities';
    protected $primaryKey = 'id';

    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }

    public function provinsi()
    {
        return $this->belongsTo(Province::class, 'province_code');
    }
}
