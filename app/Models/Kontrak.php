<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    use HasFactory;
    protected $guard = 'kontrak';
    protected $table = 'kontrak';
    protected $fillable = [
        'durasi',
        'gaji',
        'id_pegawai'
    ];
}
