@extends('dashboard/dashboardAdmin')

@section('layout')
    <h1>Ubah Data Semester</h1>
@endsection

@section('isi')
@if(session('status'))
    <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
</ul>

</div>
@endif
<form action="{{ route('semester.update', $semester->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" id="user_id" name="user_id" required value="{{ auth()->user()->id }}">
        <div class="mb-3">
            <label for="semesterEdit" class="form-label">Semester</label>
            <input type="text" class="form-control" id="namaSemester" name="namaSemester" value="{{ $semester->namaSemester }}" placeholder="semester" readonly>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" name="status" value="{{ $semester->status }}" >
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
        </div>
        <!-- <input type="hidden" id="status" name="status" value="Sedang Diproses" required> -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
