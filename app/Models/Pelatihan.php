<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;

    protected $table = 'pelatihans';
    protected $fillable = [
        'nama', 'jenis', 'kuota_tersisa', 'kuota_total', 'tanggal_mulai', 'tanggal_selesai', 'lokasi', 'status', 'metode',
    ];
}
