<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class Peserta extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'peserta';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'tanggal_lahir',
        'nim',
        'jurusan',
        'angkatan',
        'no_hp',
        'email',
        'password',
        'foto_peserta'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    public function Course()
    {
        return $this->belongsToMany(Course::class, 'peserta_course',  'peserta_id', 'course_id')
                    ->withPivot('nik','ktm', 'ktp', 'status', 'created_at');
    }

    public function Assignment()
    {
        return $this->belongsToMany(Assignment::class, 'peserta_assignment',  'peserta_id', 'assignment_id')
                    ->withPivot('file_assignments','nilai','deskripsi');
    }

    public function feedback(){

        return $this->hasMany(Feedback::class);
    }

    public function Timeline()
    {
        return $this->hasMany(Timeline::class);
    }
}
