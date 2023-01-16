<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    use HasFactory;
    protected $guard = 'jabatan';
    protected $table = 'jabatan';
    protected $fillable = [
        'posisi',
    ];
}
