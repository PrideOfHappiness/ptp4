@extends('dashboard/dashboardAdmin')

@section('layout')
    <h1>List Data Matakuliah</h1>
@endsection

@section('isi')
    <div class = "pull-right mb-2">
        <a class="btn btn-success" href="{{ route('matakuliah.create') }}"> Tambah Data Matakuliah</a>
    </div>

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
                <th>Dosen Yang Mengajar</th>
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
                <td>{{ $matkul->dosen->name}}
                <td>{{ $matkul->tempat_kelas }}</td>
                <td>{{ $matkul->tanggal }}</td>
                <td>{{ $matkul->jam_mulai }} </td>
                <td>{{ $matkul->jam_selesai }}</td>
                <td>
                    <form action = "{{ route('matakuliah.destroy', $matkul->id) }}" method="Post">
                      <a class="badge bg-info" href="{{ route('matakuliah.show',$matkul->id) }}">Detail</span></a>
                      <a class="badge bg-warning" href="{{ route('matakuliah.edit', $matkul->id) }}">Edit</span></a>
                      @csrf
                      @method("DELETE")
                      <button type="submit" class="badge bg-danger"> Delete </button>
                    </form>
                </td>
              </tr>
            @endforeach
            </tbody>
    </table>
    {!! $dataMatkul->links() !!}
@endsection
