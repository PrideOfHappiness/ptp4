@extends('dashboard/dashboardAdmin')

@section('layout')
    <h1>List Data Semester</h1>
@endsection

@section('isi')
    <div class = "pull-right mb-2">
        <a class="btn btn-success" href="{{ route('semester.create') }}"> Tambah Semester</a>
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
                <th>Semester</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($dataSemester as $semester)
              <tr>
                <td>{{ $semester->id }} </td>
                <td>{{ $semester->namaSemester }}</td>
                <td>{{ $semester->status }}</td>
                <td>
                    <form action = "{{ route('semester.destroy', $semester->id) }}" method="Post">
                      <a class="badge bg-info" href="{{ route('semester.show',$semester->id) }}">Detail</span></a>
                      <a class="badge bg-warning" href="{{ route('semester.edit', $semester->id) }}">Edit</span></a>
                      @csrf
                      @method("DELETE")
                      <button type="submit" class="badge bg-danger"> Delete </button>
                    </form>
                </td>
              </tr>
            @endforeach
            </tbody>
    </table>
    {!! $dataSemester->links() !!}
@endsection
