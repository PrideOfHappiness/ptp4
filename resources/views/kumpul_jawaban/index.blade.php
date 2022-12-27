@extends('dashboard/dashboardMahasiswa')

@section('layout')
    <h1>List Data Tugas</h1>
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
                <th>ID</th>
                <th>Nama Tugas </th>
                <th>Nama File</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($tugas as $semester)
              <tr>
                <td>{{ $semester->id }} </td>
                <td>{{ $semester->judul}} </td>
                <td>
                      <a class="badge bg-warning" href="listTugas/{{ $semester->id }}">Kumpul Tugas</span></a>
                    </form>
                </td>
              </tr>
            @endforeach
            </tbody>
    </table>
    {!! $tugas->links() !!}
@endsection
