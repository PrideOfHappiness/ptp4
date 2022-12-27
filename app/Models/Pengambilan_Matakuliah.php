<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengambilan_Matakuliah extends Model
{
    use HasFactory;

    protected $table = "pengambilan_matakuliah";

    protected $fillable = [
        'user_id_mahasiswa',
        'id_matakuliah',
        'id_semester',
    ];
    protected $hidden = [
        'user_id_mahasiswa',
        'id_matakuliah',
        'id_semester',
    ];

    public function id_mahasiswa(){
        return $this->belongsTo(User::class, "user_id_mahasiswa");
    }

    public function matakuliah(){
        return $this->belongsTo(Matakuliah::class, "id_matakuliah");
    }

    public function semester(){
        return $this->belongsTo(Semester::class, "id_semester");
    }
}
