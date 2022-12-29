<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Validator;
use Dompdf\Dompdf;
use App\Models\Kumpul_Jawaban;
use App\Models\Pengambilan_Matakuliah;
use App\Models\Tugas;

class Kumpul_TugasController extends Controller
{
    public function index(){
        $tugas = Tugas::latest()->paginate(10);
        return view('kumpul_jawaban.index', compact('tugas'));
    }

    public function showTugas($id){
        $dataTugas = Tugas::find($id);
        return view('kumpul_jawaban.kumpul_jawaban', compact('dataTugas'));
    }

    public function downloadTugas($lokasiFile){
        $filePath = public_path('upload\\tugas\\'.$lokasiFile);
    	$headers = ['Content-Type: application/docx'];
    	$fileName = time().'.docx';

    	return response()->download($filePath, $fileName, $headers);

    }
    public function kumpulJawaban(Request $request){
        $this->validate($request, [
            'id_mahasiswa' => 'required',
            'tugas_id' => 'required',
            'jawaban' => 'mimes:pdf,doc,docx,xlsx,xls|max:2048',
        ]);


        if($request->hasFile('jawaban')){
            $file = $request->file('jawaban');
            $namaFile = $file->getClientOriginalName();
            $file->move('upload/jawaban/', $namaFile);
        }

        $jawaban = Kumpul_Jawaban::create([
            'tugas_id' => $request->tugas_id,
            'mahasiswa_kumpul' => $request->id_mahasiswa,
            'namaFile' => $namaFile,

        ]);
        return redirect('/listTugas')
            ->with('success', 'Jawaban Berhasil Dikumpulkan!');
    }

    public function showJawabanAll($id){
        $tugas = Tugas::find($id);
        $jawaban = Kumpul_Jawaban::where('tugas_id', $id)->get();;
        return view('kumpul_jawaban.showJawaban', compact('jawaban', 'tugas'));
    }

    public function showJawabanDetail($id){
        $tugas = Tugas::find($id);
        $jawaban = Kumpul_Jawaban::find($id);
        return view('kumpul_jawaban.nilai', compact('jawaban', 'tugas'));
    }

    public function download($namaFile){
        $filePath = public_path('upload\\jawaban\\'.$namaFile);
    	$headers = ['Content-Type: application/docx'];
    	$fileName = time().'.docx';

    	return response()->download($filePath, $fileName, $headers);
    }

    public function storeNilai(Request $request, $id){
        $jawaban = Kumpul_Jawaban::find($id);

        $jawaban->mahasiswa_kumpul = $request->id_mahasiswa;
        $jawaban->tugas_id = $request->tugas_id;
        $jawaban->namaFile = $request->namaFile;
        $jawaban->nilai = $request->nilai;
        $jawaban->save();

        return redirect('/tuga/tugas/'.$id)
            ->with('success', 'Nilai Berhasil Ditambahkan!');
    }


}

