@extends('dashboard/dashboardDosen')

@section('layout')
    <h1>Ubah Data Tugas</h1>
@endsection

@section('isi')
    <form action="{{ route('tuga.update', $tuga->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" id="user_id_dosen" name="user_id_dosen" value="{{ auth()->user()->id }}" required>
        <div class="mb-3">
            <label for="matakuliah_id" class="form-label">Matakuliah</label>
            <select name="matakuliah_id" id="matakuliah_id" class="form-control select2-multiple" >
                <option value="">Silahkan pilih terlebih dahulu!</option>
                @foreach($matakuliah as $matkul)
                    <option value="{{$matkul->id}}"> {{ $matkul->nama }} </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Tugas</label>
            <input type="text" class="form-control" id="judul" name="judul" value=" {{ $tuga->judul }}" placeholder="Nama Matakuliah" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value=" {{ $tuga->deskripsi }}" placeholder="Silahkan ini Deskripsi Tugas disini" required>
        </div>
        <div class="mb-3">
            <label for="lokasiFile" class="form-label">File Pendukung</label>
            <input type="file" class="form-control" id="lokasiFile" name="lokasiFile" value="{{ $tuga->lokasiFile }}"> {{ $tuga->lokasiFile}}
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

