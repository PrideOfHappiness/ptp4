<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kumpul_Jawaban extends Model
{
    use HasFactory;

    protected $table = 'kumpul_jawaban';

    protected $fillable = [
        'tugas_id',
        'mahasiswa_kumpul',
        'namaFile',
        'nilai',
    ];

    public function tugasId(){
        return $this->belongsTo(Tugas::class, "tugas_id");
    }

    public function idMahasiswa(){
        return $this->belongsTo(User::class, "mahasiswa_kumpul");
    }

}
