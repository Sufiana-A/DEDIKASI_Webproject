<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $table = 'certificates';

    protected $primaryKey = 'id';

    protected $fillable = [
        'peserta',
        'pelatihan',
        'nama_file'
    ];

    // relation many to one / belongsto
    public function peserta() {
        return $this->belongsTo(Peserta::class);
    }
    public function Course() {
        
        return $this->belongsTo(Course::class);
    }
}
