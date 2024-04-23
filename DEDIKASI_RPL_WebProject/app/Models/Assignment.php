<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $table = 'assignment';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_tugas',
        'judul_tugas',
        'deskripsi_tugas',
        'link_terkait',
        'tugas_dibuka',
        'batas_pengumpulan'
    ];
}
