<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'id',
        'uuid',
        'title',
        'class',
        'description',
        'image',
    ];

    public function Peserta()
    {
        return $this->belongsToMany(peserta::class, 'peserta_course',  'peserta_id', 'course_id')
                    ->withPivot('nik','ktm', 'ktp', 'status');
    }
}