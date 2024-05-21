<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    
    use HasFactory;


    protected $table = 'Loker';

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_perusahaan',
        'posisi',
        'tipe_pekerjaan',
        'kota',
        'kategori_pekerjaan',
        'deskripsi_loker',
        'link_loker',
    ];

   }
