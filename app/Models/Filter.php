<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id' => 'required',
            'jeniskegiatan_id' => 'required',
            'daftarkegiatans_id' => 'required',
    ];

    protected $hidden = [

    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id','id');
    }
    
    public function jeniskegiatan()
    {
        return $this->belongsTo(Jeniskegiatan::class, 'jeniskegiatan_id','id');
    }

    public function daftarkegiatan()
    {
        return $this->belongsTo(Daftarkegiatan::class, 'daftarkegiatans_id','id');
    }
}
