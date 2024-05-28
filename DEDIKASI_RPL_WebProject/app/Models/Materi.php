<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'Materi';

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_materi',
        'judul_materi',
        'pelatihan',
        'deskripsi_materi',
        'link_terkait',
    ];

    public function course(){
        return $this->belongsTo(Course::class, 'pelatihan', 'uuid');
    }
}
