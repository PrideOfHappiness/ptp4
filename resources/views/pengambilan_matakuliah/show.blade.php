@extends('dashboard/dashboardAdmin')

@section('layout')
    <h1>Detail Data Pengambilan Matakuliah</h1>
@endsection

@section('isi')
        <div class="mb-3">
            <label for="user_id_mahasiswa" class="form-label">Nama Mahasiswa</label>
            <select name="user_id_mahasiswa" id="user_id_mahasiswa" >
                @foreach($mahasiswa as $mhs)
                    <option value="{{ $mhs->id }}"> {{ $mhs->name }} </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_matakuliah" class="form-label">Matakuliah</label>
            <select name="id_matakuliah" id="id_matakuliah">
                @foreach($matakuliah as $matkul)
                    <option value="{{ $matkul->id }}"> {{ $matkul->nama }} </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_semester" class="form-label">Semester</label>
            <select name="id_semester" id="id_semester">
                @foreach($semester as $sms)
                    <option value="{{ $sms->id }}"> {{ $sms->namaSemester }} </option>
                @endforeach
            </select>
        </div>
@endsection
