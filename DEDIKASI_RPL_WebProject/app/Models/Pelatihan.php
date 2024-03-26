<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pelatihan',
        'nama_pelatihan',
        'kategori_pelatihan',
    ];

    /** auto genarate id */
    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $getPengguna = self::orderBy('id_pelatihan', 'desc')->first();

            if ($getPengguna) {
                $ID_terbaru = intval(substr($getPengguna->id_pelatihan, 5));
                $ID_selanjutnya = $ID_terbaru + 1;
            } else {
                $ID_selanjutnya = 1;
            }
            $model->id_pelatihan = 'PRE' . sprintf("%03s", $ID_selanjutnya);
            while (self::where('id_pelatihan', $model->id_pelatihan)->exists()) {
                $ID_selanjutnya++;
                $model->id_pelatihan = 'PRE' . sprintf("%03s", $ID_selanjutnya);
            }
        });
    }
}
