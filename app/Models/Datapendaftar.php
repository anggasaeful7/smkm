<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datapendaftar extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'npm_nidn',
        'instansi',
        'jenisikutserta_id',
        'audience_type'
    ];

    protected $hidden = [

    ];

    public function jenisikutserta()
    {
        return $this->belongsTo(Jenisikutserta::class, 'jenisikutserta_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
    
}
