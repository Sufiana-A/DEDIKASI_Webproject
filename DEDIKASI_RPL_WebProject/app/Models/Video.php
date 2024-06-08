<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $table = 'videos';
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_video',
        'judul_video',
        'pelatihan',
        'deskripsi_video',
        'link_terkait',
    ];

    public function course(){
        return $this->belongsTo(Course::class, 'pelatihan', 'uuid');
    }
}
