<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    use HasFactory;

    protected $table = 'indonesia_provinces';
    protected $primaryKey = 'id';

    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }

    public function cities()
    {
        return $this->hasMany(Cities::class);
    }
}
