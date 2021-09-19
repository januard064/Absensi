@extends('layouts.app')

@section('content')

<div class="container">
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Riwayat Absensi</div>

                <div class="card-body">
            

                  <table class="table table-responsive table-berdered table-hover"> 
                        <thead> 
                            <th>Id Karyawan </th>
                            <th>Nama Karyawan</th>
                            <th>Tanggal</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                            <th>Keterangan</th>
                           
                           

                        </thead>
                        <tbody> 
                            @foreach($laporan_absen as $absen)
                                <tr>
                                    <td>{{$absen->user_id}}</td>
                                    <td>{{$absen->absensi}}</td>
                                    <td>{{$absen->hari}}</td>
                                    <td>{{$absen->waktu_masuk}}</td>
                                    <td>{{$absen->waktu_keluar}}</td>
                                    <td>{{$absen->catatan}}</td>
                                </tr>
                           
                            @endforeach
                        </tbody>
                  </table>
                 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection