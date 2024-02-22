<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jeniskegiatan extends Model
{
    use HasFactory;

    protected $table = 'jeniskegiatan';

    protected $fillable = [
        'name',
    ];

    public $timestamps = true;
}
