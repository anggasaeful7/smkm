<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'daftarkegiatan_id',
        'user_id',
        'department_id',
        'jeniskegiatan_id',
    ];

    public function daftarkegiatan()
    {
        return $this->belongsTo(DaftarKegiatan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function jeniskegiatan()
    {
        return $this->belongsTo(JenisKegiatan::class);
    }
}
