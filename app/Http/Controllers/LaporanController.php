<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kumpul_Jawaban;
use App\Models\User;
use App\Models\Matakuliah;
use App\Models\Tugas;
use App\Models\Pengambilan_Matakuliah;
use DB;

class LaporanController extends Controller
{
    public function index(){
        $laporan = User::where('hak_akses', 'Mahasiswa')->paginate(10);
        return view('laporan.index', compact('laporan'));
    }

    public function buatLaporan(){
        $mahasiswa = User::selectRaw("id, nim, name, concat(users.nim, ' - ', users.name) as nama")
            ->where('hak_akses', 'Mahasiswa')->where('status', 'Aktif')->get();
        return view('laporan.create', compact('mahasiswa'));
    }

    public function laporan(Request $request, $mahasiswa){
        $data = Kumpul_Jawaban::find($mahasiswa);
        $avgNilai = Kumpul_Jawaban::selectRaw("id, nilai")->where('mahasiswa_kumpul', $mahasiswa)->avg('nilai');
        $nilai_mahasiswa =DB::table('kumpul_jawaban')
            ->join('tugas', 'kumpul_jawaban.tugas_id', '=', 'tugas.id')
            ->select('*')
            ->get();;
        return view('laporan.detail', compact('data', 'avgNilai','nilai_mahasiswa'));


    }
}
