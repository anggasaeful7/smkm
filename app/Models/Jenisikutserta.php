<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenisikutserta extends Model
{
    use HasFactory;

    protected $table = 'jenisikutsertas';

    protected $fillable = [
        'name',
    ];

    public $timestamps = true;
}
