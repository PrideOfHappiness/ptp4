<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;
use Illuminate\Http\Response;

class SemesterController extends Controller
{
    public function index(){
        $dataSemester = Semester::latest()->paginate(5);
        return view('semester.index', compact('dataSemester'));
    }

    public function create(){
        return view('semester.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'user_id' => 'required',
            'semester' => 'required',
            'status' => 'required',
        ]);

        $semester = Semester::create([
            'user_id' => $request->user_id,
            'namaSemester' => $request->semester,
            'status' => $request->status,
        ]);

        return redirect()->route('semester.index')
            ->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function show(Semester $semester){
        return view('semester.show',compact('semester'));
    }

    public function edit(Semester $semester){
        return view('semester.edit',compact('semester'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'user_id' => 'required',
            'namaSemester' => 'required',
            'status' => 'required',
        ]);

        $semester = Semester::find($id);
        $semester->update($request->all());
        return redirect()->route('semester.index')
            ->with('success', 'Data Berhasil Diubah!');
    }

    public function destroy($id){
        $semester = Semester::find($id);
        $semester->delete();

        return redirect()->route('semester.index')
            ->with('success', 'Data Berhasil Dihapus!');
    }
}
