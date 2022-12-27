@extends('dashboard/dashboardAdmin')

@section('layout')
    <h1>List Data User</h1>
@endsection

@section('isi')
    <div class = "pull-right mb-2">
        <a class="btn btn-success" href="{{ route('user.create') }}"> Tambah Data User</a>
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
                <th>User ID</th>
                <th>Nama</th>
                <th>Status Pekerjaan</th>
                <th>No. Telp</th>
                <th>Email</th>
                <th>Status Aktif?</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($dataUser as $user)
              <tr>
                <td>{{ $user->id }} </td>
                <td>{{ $user->nim }} </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->hak_akses }}</td>
                <td>{{ $user->no_hp }} </td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->status }}</td>
                <td>
                    <form action = "{{ route('user.destroy', $user->id) }}" method="Post">
                      <a class="badge bg-info" href="{{ route('user.show',$user->id) }}">Detail</span></a>
                      <a class="badge bg-warning" href="{{ route('user.edit', $user->id) }}">Edit</span></a>
                      @csrf
                      @method("DELETE")
                      <button type="submit" class="badge bg-danger"> Delete </button>
                    </form>
                </td>
              </tr>
            @endforeach
            </tbody>
    </table>
    {!! $dataUser->links() !!}
@endsection
