@extends('dashboard/dashboardAdmin')

@section('layout')
    <h1>Tambah Data User</h1>
@endsection

@section('isi')
    <form action="{{ route('user.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input type="text" class="form-control" id="nim" name="nim" placeholder="User ID (NIM/NIK)" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nama" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email" required>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor Telepon</label>
            <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor Telepon Aktif" required>
        </div>
        <div class="mb-3">
            <label for="hak_akses" class="form-label">Status Jabatan</label>
            <select name="hak_akses" id="hak_akses">
                <option value=""> Pilih Hak Akses User terlebih dahulu! </option>
                <option value="Admin">Admin</option>
                <option value="Dosen">Dosen</option>
                <option value="Mahasiswa">Mahasiswa</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status">
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
