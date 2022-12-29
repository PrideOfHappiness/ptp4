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
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Mahasiswa </th>
                        <th>Nilai
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jawaban as $jwb)
                        <tr>
                            <td> {{ $jwb->idMahasiswa->name }} </td>
                            <td> {{ $jwb->nilai }}
                            <td>
                                <a class="badge bg-warning" href="/tuga/tugas/{{$jwb->id}}/jawaban">Lihat Jawaban Mahasiswa & Beri Nilai</span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
