<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Response;
use App\Models\Matakuliah;
use App\Models\Tugas;

class TugasController extends Controller
{
    public function index(){
        $dataTugas = Tugas::paginate(15);
        return view('tuga.index', compact('dataTugas'));
    }

    public function create(){
        $matakuliah = Matakuliah::with('matakuliah_id')->select(['id', 'nama'])->get();
        return view('tuga.create')->with('matakuliah', $matakuliah);
    }

    public function store(Request $request){
        $this->validate($request, [
            'user_id_dosen' => 'required',
            'matakuliah_id' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'file' => 'mimes:csv,pdf,docx,xlsx,xls,doc|max:2048',
        ]);

        if($request->hasFile('file')){
            $file = $request->file('file');
            $namaFile = $file->getClientOriginalName();
            $file->move('upload/tugas/', $namaFile);
        }

        //dd($path);
        $tugas = Tugas::create([
            'user_id_dosen' => $request->user_id_dosen,
            'matakuliah_id' => $request->matakuliah_id,
            'judul' => $request->judul,
            'deskripsi'=> $request->deskripsi,
            'lokasiFile' => $namaFile,
        ]);

        return redirect()->route('tuga.index')
            ->with('success', 'Tugas Berhasil Ditambahkan!');
    }

    public function show(Tugas $tuga) {
        return view('tuga.show')->with('tugas', $tuga);
    }

    public function edit(Tugas $tuga){
        $matakuliah = Matakuliah::with('matakuliah_id')->select(['id', 'nama'])->get();
        return view('tuga.edit', compact('tuga', 'matakuliah'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'user_id_dosen' => 'required',
            'matakuliah_id' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'lokasiFile' => 'mimes:csv,pdf,docx,xlsx,xls,doc|max:2048',
        ]);

        $update = ['lokasiFile' => $request->lokasiFile];
        $tugas = Tugas::find($id);

        if($request->hasFile('file')){
            $file = $request->file('file');
            $namaFile = $file->getClientOriginalName();
            $file->move('upload/tugas/', $namaFile);
            $tugas_awal = $tugas['lokasiFile'];
            $update['lokasiFile'] = $namaFile;

            if(isset($tugas_awal) && file_exists($tugas_awal)){
                unlink($tugas_awal);
            }
        }

        $tugas->update($request, $update);

        return redirect()->route('tuga.index')
            ->with('success', 'Data Berhasil Diubah!');
    }

    public function destroy(Tugas $tuga){
        $tuga->delete();

        return redirect()->route('tuga.index')
            ->with('success', 'Data Berhasil dihapus!');
    }

    public function download($lokasiFile){
        $filePath = public_path('upload\\tugas\\'.$lokasiFile);
    	$headers = ['Content-Type: application/docx'];
    	$fileName = time().'.docx';

    	return response()->download($filePath, $fileName, $headers);
    }

}

