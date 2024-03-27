<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peserta extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'tanggal_lahir',
        'nim',
        'jurusan',
        'angkatan',
        'no_hp',
        'email',
        'password',
        'foto_peserta'
    ];
}
