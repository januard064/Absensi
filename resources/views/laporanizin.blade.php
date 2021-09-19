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
                            <!-- <th>Nama Karyawan</th> -->
                            <th>Hari</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Alasan</th>
                            <th>Status</th>
                            <th>Konfirmasi</th>
                          
                           

                        </thead>
                        <tbody> 
                            @foreach($laporan_izin as $izin)
                                <tr>
                                    <td>{{$izin->user_id}}</td>
                                    <!-- <td>{{$izin->absensi}}</td> -->
                                    <td>{{$izin->hari}}</td>
                                    <td>{{$izin->waktu_mulai}}</td>
                                    <td>{{$izin->waktu_berakhir}}</td>
                                    <td>{{$izin->alasan}}</td>
                                    <td>{{$izin->status}}</td>
                                    <td>
                                      <a href="izin/konfirmasi/{{$izin->id}}"> Konfirmasi </a>
                                    </td>

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