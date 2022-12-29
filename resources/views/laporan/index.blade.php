@extends('dashboard/dashboardAdmin')

@section('layout')
    <h1>List Data Laporan</h1>
@endsection

@section('isi')
    <div class = "pull-right mb-2">
        <a class="btn btn-success" href="/tuga/create"> Tambah Laporan Nilai Akhir</a>
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
    @endif

    <table class="table">
            <thead>
              <tr>
                <th>Nama Mahasiswa </th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($laporan as $semester)
              <tr>
                <td>{{ $semester->name}} </td>
                <td>
                      <a class="badge bg-warning" href="laporan/{{$semester->id}}">Lihat Laporan</span></a>
                </td>
              </tr>
            @endforeach
            </tbody>
    </table>
    {!! $laporan->links() !!}
@endsection
