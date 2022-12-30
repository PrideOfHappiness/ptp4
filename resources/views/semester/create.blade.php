@extends('dashboard/dashboardAdmin')

@section('layout')
    <h1>Tambah Data Semester</h1>
@endsection

@section('isi')
    <form action="{{ route('semester.store') }}" method="post">
        @csrf
        <input type="hidden" id="user_id" name="user_id" required value="{{ auth()->user()->id }}">
        <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <input type="number" class="form-control" id="semester" name="semester" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" name="status" >
                <option value=""> Pilih Status Semester terlebih dahulu! </option>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
        </div>
        <!-- <input type="hidden" id="status" name="status" value="Sedang Diproses" required> -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
