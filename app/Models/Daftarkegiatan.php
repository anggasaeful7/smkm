<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftarkegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_pelaksanaan',
        'department_id',
        'nama_kegiatan',
        'jeniskegiatan_id',
        'deskripsi',
        'ruangan',
        'batas',
        'letter_file',
        'letter_type',
    ];

    protected $hidden = [];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function jeniskegiatan()
    {
        return $this->belongsTo(Jeniskegiatan::class, 'jeniskegiatan_id', 'id');
    }
}
