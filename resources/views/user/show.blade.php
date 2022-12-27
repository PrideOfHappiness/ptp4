@extends('dashboard/dashboardAdmin')

@section('layout')
    <h1>Detail Data User</h1>
@endsection

@section('isi')
<div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input type="text" class="form-control" id="nim" name="nim" placeholder="User ID (NIM/NIK)" value="{{ $user->nim }}" readonly>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nama" value="{{ $user->name }}" readonly>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Alamat Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email" value="{{ $user->email }}" readonly>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor Telepon</label>
            <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor Telepon Aktif" value="{{ $user->no_hp }}" readonly>
        </div>
        <div class="mb-3">
            <label for="hak_akses" class="form-label">Status Jabatan</label>
            <input type="text" class="form-control" id="hak_akses" name="hak_akses" placeholder="Nomor Telepon Aktif" value="{{ $user->hak_akses }}" readonly>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status Aktif? </label>
            <input type="text" class="form-control" id="status" name="status" placeholder="Nomor Telepon Aktif" value="{{ $user->status }}" readonly>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ $user->password }}" readonly>
        </div>
@endsection