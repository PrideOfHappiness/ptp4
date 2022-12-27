<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kumpul_Jawaban;
use App\Models\User;

class LaporanController extends Controller
{
    public function index(){
        $laporan = Kumpul_Jawaban::latest()->paginate(15);
        return view('laporan.index', compact('laporan'));
    }

    public function buatLaporan(){
        $mahasiswa = User::selectRaw("id, nim, name, concat(users.nim, ' - ', users.name) as nama")
            ->where('hak_akses', 'Mahasiswa')->where('status', 'Aktif')->get();
        return view('laporan.create', compact('mahasiswa'));
    }

    public function laporan(Request $request){
        $this->validate($request, [
            'id_mahasiswa' => 'required'
        ]);

        $id_mahasiswa = $request->id_mahasiswa;

        $nilai = Kumpul_Jawaban::selectRaw("id, nilai")->where('id_mahasiswa', $id_mahasiswa)->get();


    }
}
