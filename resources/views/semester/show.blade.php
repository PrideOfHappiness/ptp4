@extends('dashboard/dashboardAdmin')

@section('layout')
    <h1>Lihat Mendetail Data Semester</h1>
@endsection

@section('isi')
    <input type="hidden" id="user_id" name="user_id" required value="{{ auth()->user()->id }}">
        <div class="mb-3">
            <label for="semesterEdit" class="form-label">Semester</label>
            <input type="text" class="form-control" id="namaSemester" name="namaSemester" value="{{ $semester->namaSemester }}" placeholder="semester" readonly>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control" id="status" name="status" value="{{ $semester->status }}" placeholder="status" readonly>
        </div>
@endsection
