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
        {{ $tugas->judul }}
    </div>
    <div class="mb-3">
        <label for="matakuliah_id" class="form-label">File Jawaban : </label>
        <a href="upload/jawaban/{{ $jawaban->namaFile }}"> {{ $jawaban->namaFile }} </a>
        <br/>
        <a class="badge bg-info" href="{{url('/jawaban/download/'.$jawaban->namaFile)}}" > Download Jawaban </a>
    </div>
    <form action="/jawaban/{{ $tugas->id}}/nilai" method="post"> 
        @csrf
        @method('PUT')
        <input type="hidden" name="tugas_id" value="{{ $tugas->id }}">
        <input type="hidden" name="id_mahasiswa" value="{{ $jawaban->mahasiswa_kumpul }}">
        <input type="hidden" name="namaFile" value="{{ $jawaban->namaFile }}">
        <div class="mb-3">
            <label for="judul" class="form-label">Nilai Jawaban</label>
            <input type="number" class="form-control" id="nilai" name="nilai" placeholder="Nilai" required>
        </div>
        <button type="submit" class="btn btn-primary">Unggah Nilai</button>
    </form>
@endsection
