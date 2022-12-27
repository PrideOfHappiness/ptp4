@extends('dashboard/dashboardMahasiswa')

@section('layout')
    <h1>List Data Tugas</h1>
@endsection

@section('isi')
    @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
    @endif

    <div class="mb-3">
        <label for="judul" class="form-label">Judul Tugas :</label>
        <br/>
        {{ $dataTugas->judul }}
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi Tugas :</label>
        <br/>
        {{ $dataTugas->deskripsi }}
    </div>
    <div class="mb-3">
        <label for="matakuliah_id" class="form-label">File Tugas : </label>
        <a href="upload/tugas/{{ $dataTugas->lokasiFile }}"> {{ $dataTugas->lokasiFile }} </a>
        <br/>
        <a class="badge bg-info" href="{{url('listTugas/tugas/download/'.$dataTugas->lokasiFile)}}" > Download Tugas </a>
    </div>
    <form action="/kumpulTugas/upload", method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="tugas_id" value="{{ $dataTugas->id }}">
        <input type="hidden" name="id_mahasiswa" value="{{ auth()->user()->id }}">
        <div class="mb-3">
                <label for="jawaban" class="form-label">File Jawaban : </label>
                <input type="file" name="jawaban" id="jawaban" >
            </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
