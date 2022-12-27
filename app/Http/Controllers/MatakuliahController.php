<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;
use App\Models\Matakuliah;
use Illuminate\Http\Response;
use Carbon\Carbon;

class MatakuliahController extends Controller
{
    public function index(){
        $dataMatkul = Matakuliah::latest()->paginate(15);
        return view('matakuliah.index', compact('dataMatkul'));
    }

    public function indexDosen(){
        $dataMatkul = Matakuliah::where('nama_dosen', auth()->user()->name)->paginate(10);
        return view('matakuliah.indexDosen', compact('dataMatkul'));
    }

    public function create(){
        $dosen = User::selectRaw("id, nim, name, concat(users.nim, ' - ', users.name) as nama")
            ->where('hak_akses', 'Dosen')->where('status', 'Aktif')->get();
        return view('matakuliah.create')->with('dosen', $dosen);
    }

    public function store(Request $request){
        $this->validate($request, [
            'user_id' => 'required',
            'nama' => 'required',
            'nama_dosen' => 'required' ,
            'tempat_kelas'=> 'required',
            'tanggal' => 'required',
            'hari_pelaksanaan' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $tanggal = Carbon::createFromFormat('Y-m-d H:i:s', $request->date('tanggal'));
        $matakuliah = Matakuliah::create([
            'user_id' => $request->user_id,
            'nama' => $request->nama,
            'nama_dosen' => $request->nama_dosen,
            'tempat_kelas' => $request->tempat_kelas,
            'tanggal' => $tanggal,
            'hari_pelaksanaan' => $request->hari_pelaksanaan,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function show(Matakuliah $matakuliah){
        return view('matakuliah.show')->with('matakuliah', $matakuliah);
    }

    public function edit(Matakuliah $matakuliah){
        $dosen = User::selectRaw("id, nim, name, concat(users.nim, ' - ', users.name) as nama")
            ->where('hak_akses', 'Dosen')->where('status', 'Aktif')->get();
        return view('matakuliah.edit', compact('matakuliah', 'dosen'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'nama' => 'required',
            'nama_dosen' => 'required' ,
            'tempat_kelas'=> 'required',
            'tanggal' => 'required',
            'hari_pelaksanaan' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $tanggal = Carbon::createFromFormat('Y-m-d H:i:s', $request->date('tanggal'));
        $matakuliah = Matakuliah::find($id);

        $matakuliah->update($request->all());

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data Berhasil Diubah!');
    }

    public function destroy(Matakuliah $matakuliah){
        $matakuliah->delete();

        return redirect()->route('matakuliah.index')
            ->with('success', 'Data Berhasil Dihapus!');
    }


}
