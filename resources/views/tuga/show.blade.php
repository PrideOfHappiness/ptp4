@extends('dashboard/dashboardDosen')

@section('layout')
    <h1>Detail Data Tugas</h1>
@endsection

@section('isi')
        <input type="hidden" id="user_id_dosen" name="user_id_dosen" value="{{ auth()->user()->id }}" required>
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Tugas</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $tugas->judul }} " required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Tugas</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $tugas->deskripsi }} " readonly>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">File Pendukung : </label>
            <a href="upload/tugas/{{$tugas->lokasiFile }}"> {{ $tugas->lokasiFile }} </a>
            <br/>
        
            <a class="badge bg-info" href="{{url('tuga/tugas/download/'.$tugas->lokasiFile)}}" > Download Tugas </a>
        </div>
@endsection

