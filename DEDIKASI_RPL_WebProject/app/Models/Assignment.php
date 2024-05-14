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
        'description',
        'additional',
    ];
    public function peserta()
    {
        return $this->belongsToMany(peserta::class, 'peserta_assignment',  'peserta_id', 'assignment_id')
                    ->withPivot('file_assignments','nilai','deskripsi');
    }

}
