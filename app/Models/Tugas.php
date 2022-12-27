<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $table='tugas';

    protected $fillable = [
        'matakuliah_id',
        'user_id_dosen',
        'judul',
        'deskripsi',
        'lokasiFile',
    ];

    protected $hidden = [
        'matakuliah_id',
    ];

    public function matakuliah(){
        return $this->belongsTo(Matakuliah::class, 'matakuliah_id');
    }

    public function id_dosen(){
        return $this->belongsTo(User::class, "user_id_dosen");
    }

    public function tugas_id(){
        return $this->hasMany(Kumpul_Jawaban::class, "tugas_id");
    }
}
