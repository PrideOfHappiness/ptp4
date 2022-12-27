@extends('dashboard/dashboardDosen')

@section('layout')
    <h1>Detail Data Matakuliah</h1>
@endsection

@section('isi')
        <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}" required>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Matakuliah</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $matakuliahDosen->nama }} " placeholder="Nama Matakuliah" required>
        </div>
        <div class="mb-3">
            <label for="nama_dosen" class="form-label">Nama Dosen</label>
            <input type="text" class="form-control" id="namaDosen" name="nama_dosen" value="{{ auth()->user()->name }}"placeholder="Nama Matakuliah" readonly>
        </div>
        <div class="mb-3">
            <label for="tempat_kelas" class="form-label">Tempat Kelas</label>
            <input type="text" class="form-control" id="tempat_kelas" name="tempat_kelas" value="{{ $matakuliahDosen->tempat_kelas }}" placeholder="Tempat Kelas" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Tanggal Pelaksanaan</label>
            <input type="text" class="form-control" id="tanggal" name="tanggal" value="{{ $matakuliahDosen->tanggal }} "required>
        </div>
        <div class="mb-3">
            <label for="hari_pelaksanaan" class="form-label">Hari Pelaksanaan Kelas</label>
            <input type="text" class="form-control" id="hari_pelaksanaan" name="hari_pelaksanaan" value="{{ $matakuliahDosen->hari_pelaksanaan }}" placeholder="Hari Pelaksanaan" required>
        </div>
        <div class="mb-3">
            <label for="jam_mulai" class="form-label">Jam Mulai Kelas</label>
            <input type="text" class="form-control" id="jam_mulai" name="jam_mulai" value="{{ $matakuliahDosen->jam_mulai }}" placeholder="Jam Mulai Kelas" required>
        </div>
        <div class="mb-3">
            <label for="jam_selesai" class="form-label">Jam Selesai Kelas</label>
            <input type="text" class="form-control" id="jam_selesai" name="jam_selesai" value="{{ $matakuliahDosen->jam_selesai }}" placeholder="Jam Selesai Kelas" required>
        </div>
    </form>
@endsection

