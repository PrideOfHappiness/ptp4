<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Matakuliah;
use Illuminate\Http\Response;

class MatakuliahDosenController extends Controller
{
    public function index(){
        $dataMatkul = Matakuliah::where('nama_dosen', auth()->user()->id)->paginate(15);
        return view('matakuliahDosen.index', compact('dataMatkul'));
    }

    public function show(Matakuliah $matakuliahDosen){
        return view('matakuliahDosen.show',compact('matakuliahDosen'));
    }


}
