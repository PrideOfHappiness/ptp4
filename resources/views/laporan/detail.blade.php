@extends('dashboard\dashboardAdmin')

@section('isi')
<div class="container">
<div class="row">
        <div class="col-md-2">
          <div class="box box-widget widget-user-2">
            <div class="widget-user-header">
              <div class="widget-user-image">
                <img src="img/33.UKDW.png" alt="User Avatar">
              </div>
            </div>
          </div>
        </div>
<div>
    <div class="col-md-5" >
          <h3>Universitas Kristen Duta Wacana<h3>
          <h3>FAKULTAS TEKNOLOGI INFORMASI</h3>
          <ul>
              <li>PROGRAM STUDI INFORMATIKA
              <li>PROGRAM STUDI SISTEM INFORMASI
          </ul>
    </div>
</div>
</div>
    <div class="row" align="center">
        <h2><em><u>Kartu Hasil Studi</u></em></h2>
    </div><br>
    <div class="col-sm">
    <h3>Dengan ini Yang Tertera Di Bawah Ini :</h3>
    <div class="col-sm">
    <ul>
      <li>
        <h3> NIM  : {{ $data->idMahasiswa->nim }}</h3><!--Nik-->
      </li>
      <li>
        <h3> Nama : {{ $data->idMahasiswa->name}} </h3><!--Nama-->
      </li>
    </ul>
    </div>
    <div class="col-sm">
    <h3>Telah Menyelesaikan Tugas-Tugas dengan Keterangan:
        <!--Tema Kegiatan,Penyelenggara Kegiatan, Tempat Kegiatan, Hari, Tanggal Pelaksanaan Kegiatan-->
    <br>
    <table name="table table-bordered">
        <thead>
            <tr>
                <th> Nama Tugas </th>
                <th> Nilai </th>
            </tr>
        </thead>
        <tbody>
            @foreach($nilai_mahasiswa as $data)
            <tr>
                <td> {{ $data->judul }} </td>
                <td> {{ $data->nilai }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    Dengan Rata-Rata Nilai Studi Adalah : {{ $avgNilai}}
    <h3>Demikian laporan kartu hasil studi ini dibuat untuk dapat dipergunakan sebagaimana perlunya. </h3>
    <br>
    </div>
    <div align="right">
            <h2>24 Januari 2020<h2>
            <h2>Pencetak ,</h2><br><br><br><br><br><br>
            <h3><b><u>Admin</u></b></h3><!--Nama Pengirim-->
            <h3></h3><!--NIK Pengirim-->
    </div>
  </div>
</div>
</div>
@endsection
