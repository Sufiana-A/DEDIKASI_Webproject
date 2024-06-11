<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $table = 'assignments';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_tugas',
        'title',
        'pelatihan',
        'description',
        'additional',
    ];

    public function peserta()
    {
        return $this->belongsToMany(peserta::class, 'assignment_peserta',  'peserta_id', 'id_tugas')
                    ->withPivot('file_assignments','text_assignments','nilai','deskripsi');
    }

    public function course(){
        return $this->belongsTo(Course::class, 'pelatihan', 'uuid');
    }

}