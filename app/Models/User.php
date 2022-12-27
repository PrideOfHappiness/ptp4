<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'nim',
        'name',
        'email',
        'password',
        'hak_akses',
        'no_hp',
        'status',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function nama_dosen(){
        return $this->hasMany(Matakuliah::class, "nama_dosen");
    }

    public function user_id_mahasiswa(){
        return $this->hasMany(Pengambilan_Matakuliah::class, "user_id_mahasiswa");
    }

    public function mahasiswa_kumpul(){
        return $this->hasMany(Kumpul_Jawaban::class, "mahasiswa_kumpul");
    }
}
