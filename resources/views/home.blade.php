@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$info["status"]}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  
                        <form action="/absen" method="post">
                        <table class="table table-responsive">
                        {{csrf_field()}}
                            <tr>
                                <td> 
                                    <input type="text"   class="form-control" placeholder="keterangan" name="catatan">
                                </td>
                                <td> 
                                    <input type="submit" class="btn btn-flat btn-primary" name="btnIn" value="Masuk" {{$info["btnIn"]}}> </input>
                                </td>
                                <td> 
                                    <input type="submit" class="btn btn-flat btn-primary" name="btnOut" value="Keluar" {{$info["btnOut"]}}> </input>
                                </td>
                            </tr>
                            </table>
                        </form>
                    

                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
         <a class="col-4" href="/izin"> Izin <a>
            <a class="col-4" href="/laporan"> Laporan Absen <a> 
           <a class="col-4" href="/laporanizin"> Laporan Izin <a>
        </div>
    </div>

   

    <div class="row justify-content-center">
        <div class="col-md-8">
        
            <div class="card">
                <div class="card-header">Riwayat Absensi</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  <table class="table table-responsive table-berdered table-hover"> 
                        <thead> 
                            <th>Tanggal</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                            <th>Keterangan</th>

                        </thead>
                        <tbody> 
                            @forelse($data_absen as $absen)
                                <tr>
                                    <td>{{$absen->hari}}</td>
                                    <td>{{$absen->waktu_masuk}}</td>
                                    <td>{{$absen->waktu_keluar}}</td>
                                    <td>{{$absen->catatan}}</td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="4"><b><i>Belum Pernah Absen</i></b></tf>
                            </tr>
                            @endforelse
                        </tbody>
                  </table>
                  {!! $data_absen->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
