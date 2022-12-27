@extends('dashboard/dashboardDosen')

@section('layout')
    <h1>List Data Matakuliah</h1>
@endsection

@section('isi')
    @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
    @endif

    <table class="table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Matakuliah</th>
                <th>Tempat Kelas</th>
                <th>Tanggal Pelaksanaan </th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($dataMatkul as $matkul)
              <tr>
                <td>{{ $matkul->id }} </td>
                <td>{{ $matkul->nama }} </td>
                <td>{{ $matkul->tempat_kelas }}</td>
                <td>{{ $matkul->tanggal }}</td>
                <td>{{ $matkul->jam_mulai }} </td>
                <td>{{ $matkul->jam_selesai }}</td>
                <td>
                      <a class="badge bg-info" href="{{ route('matakuliahDosen.show',$matkul->id) }}">Detail</span></a>
                </td>
              </tr>
            @endforeach
            </tbody>
    </table>
    {!! $dataMatkul->links() !!}
@endsection
