<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'class',
        'description',
        'tugas',  
        'deadline', 
        'status', 
        'peserta_id',
        'course_id'
    ];

    public function Course()
    {
        return $this->belongsToMany(Course::class);
    }

    public function Peserta()
    {
        return $this->belongsToMany(Peserta::class);
    }
}
