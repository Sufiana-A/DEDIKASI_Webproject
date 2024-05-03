<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $fillable = [
        'peserta_id',
        'pelatihan_id',
        'judul_sertifikat',
        'nama_file'
    ];

    // relation many to one / belongsto
    public function peserta() {
        return $this->belongsTo(Peserta::class);
    }

    
    
}