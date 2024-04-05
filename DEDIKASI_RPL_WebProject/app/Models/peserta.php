<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;



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
}

class Peserta extends Model
{
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

    public function pelatihan()
    {
        return $this->belongsToMany(Pelatihan::class, 'peserta_pelatihan_pivot')
                    ->withPivot('nik','ktm', 'ktp', 'status');
    }
}
