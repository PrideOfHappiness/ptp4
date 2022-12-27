<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;
    protected $table = 'semester';

    protected $fillable = [
        'user_id',
        'namaSemester',
        'status',
    ];

    public function id_semester(){
        return $this->hasMany(Pengambilan_Matakuliah::class, "id_semester");
    }

}
