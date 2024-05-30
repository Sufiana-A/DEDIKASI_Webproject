<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class mentor extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'mentor';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'tanggal_lahir',
        'nip',
        'kelompok keahlian',
        'no_hp',
        'email',
        'password',
        'foto_mentor',
        'course_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function Courses()
    {
        return $this->hasMany(Course::class);
    }
}
