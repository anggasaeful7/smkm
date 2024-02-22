<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensist extends Model
{
    use HasFactory;

    protected $fillable = [
        'daftarkegiatan_id',
        'user_id',
        'npm_nidn',
        'prodi_id',
        'instansi',
        'letter_file',
    ];

    public function daftarkegiatan()
    {
        return $this->belongsTo(DaftarKegiatan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}
