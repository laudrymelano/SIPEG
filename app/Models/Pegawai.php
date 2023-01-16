<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pegawai extends Model implements AuthenticatableContract
{
    use HasFactory, Notifiable;
    use Authenticatable;
    protected $guard = 'pegawai';
    protected $table = 'pegawai';
    protected $fillable = [
        'nama',
        'alamat',
        'password',
        'no_telp',
        'id_jabatan',
        'id_kontrak'
    ];
}
