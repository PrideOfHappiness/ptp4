<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Matakuliah;
use App\Models\Semester;
use App\Models\Pengambilan_Matakuliah;

class Pengambilan_MatakuliahController extends Controller
{
    public function index(){
        $report_kuliah = Pengambilan_Matakuliah::latest()->paginate(10);
        //$nama = User::with('user_id_mahasiswa')->get();
        //$matakuliah = Matakuliah::with('id_matakuliah')->get();
        //$semester = Semester::with('id_semester')->get();
        return view('pengambilan_matakuliah.index')->with('report_kuliah', $report_kuliah);
    }

    public function create(){
        $mahasiswa = User::selectRaw("id, nim, name, concat(users.nim, ' - ', users.name) as nama")
            ->where('hak_akses', 'Mahasiswa')->where('status', 'Aktif')->get();
        $semester = Semester::selectRaw("id, namaSemester")->get();
        $matakuliah = Matakuliah::selectRaw("id, nama")->get();
        return view('pengambilan_matakuliah.create')->with('mahasiswa', $mahasiswa)->with('semester', $semester)->with('matakuliah', $matakuliah);
    }

    public function store(Request $request){
        $this->validate($request, [
            'user_id_mahasiswa' => 'required',
            'id_semester' => 'required',
            'id_matakuliah' => 'required',
        ]);

        $pengambilan_matakuiah = Pengambilan_Matakuliah::create([
            'user_id_mahasiswa' => $request->user_id_mahasiswa,
            'id_matakuliah' => $request->id_matakuliah,
            'id_semester' => $request->id_semester,
        ]);

        return redirect()->route('pengambilan_matakuliah.index')
            ->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function show(Pengambilan_Matakuliah $ambilMatkul){
        $mahasiswa = User::with('user_id_mahasiswa')->select(['id', 'name'])->get();
        $semester = Semester::with('id_semester')->select(['id', 'namaSemester'])->get();
        $matakuliah = Matakuliah::with('id_matakuliah')->select(['id', 'nama'])->get();
        return view('pengambilan_matakuliah.show')->with('mahasiswa', $mahasiswa)->with('semester', $semester)->with('matakuliah', $matakuliah);
    }

    public function destroy($id){
        $ambilMatkul = Pengambilan_Matakuliah::find($id);
        $ambilMatkul->delete();

        return redirect()->route('pengambilan_matakuliah.index')
            ->with('success', 'Data Berhasil Dihapus!');
    }
}
