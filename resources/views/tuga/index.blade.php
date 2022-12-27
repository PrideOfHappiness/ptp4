@extends('dashboard/dashboardDosen')

@section('layout')
    <h1>List Data Tugas</h1>
@endsection

@section('isi')
    <div class = "pull-right mb-2">
        <a class="btn btn-success" href="/tuga/create"> Tambah Data Tugas</a>
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
    @endif

    <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama Tugas </th>
                <th>Waktu Upload</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($dataTugas as $semester)
              <tr>
                <td>{{ $semester->id }} </td>
                <td>{{ $semester->judul}} </td>
                <td>{{ $semester->created_at}} </td>
                <td>
                    <form action = "/tuga/{{ $semester->id }}" method="Post">
                      <a class="badge bg-info" href="/tuga/{{ $semester->id }}">Detail Tugas</span></a>
                      <a class="badge bg-warning" href="/tuga/tugas/{{$semester->id}}">Lihat Jawaban</span></a>
                      <a class="badge bg-warning" href="/tuga/{{ $semester->id }} ">Edit Tugas</span></a>
                      @csrf
                      @method("DELETE")
                      <button type="submit" class="badge bg-danger"> Hapus Tugas </button>
                    </form>
                </td>
              </tr>
            @endforeach
            </tbody>
    </table>
    {!! $dataTugas->links() !!}
@endsection
