@extends('layouts.app')

@section('content')

<div class="container"> 

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Izin</div>

                <div class="card-body">
                  
                        <form action="/izinpost" method="post">
                        <table class="table table-responsive">
                        {{csrf_field()}}
                            <tr>
                                <td> 
                                    <input type="date"  class="form-control" placeholder="Hari" name="hari">
                                </td>
                                <td> 
                                    <input type="time"  class="form-control" placeholder="Mulai" name="waktu_mulai">
                                </td>
                                <td> 
                                    <input type="time"  class="form-control" placeholder="Akhir" name="waktu_berakhir">
                                </td>
                                <td> 
                                    <input type="text"  class="form-control" placeholder="Alasan" name="alasan">
                                </td>
                                <td> 
                                    <input type="hidden"  class="form-control" name="status" value="pengajuan">
                                </td>
                                <td> 
                                <button type="submit" class="btn btn-primary">Usul</button>

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
            <div class="card">
                <div class="card-header">Riwayat Absensi</div>

              

                  <table class="table table-responsive table-berdered table-hover"> 
                        <thead> 
                            <th>Tanggal request</th>
                            <th>Tanggal Izin</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Berakhir</th>
                            <th>Alasan</th>
                            <th>Status</th>

                        </thead>
                        <tbody> 
                            @forelse($data_izin as $izin)
                                <tr>
                                    <td>{{$izin->created_at}}</td>
                                    <td>{{$izin->hari}}</td>
                                    <td>{{$izin->waktu_mulai}}</td>
                                    <td>{{$izin->waktu_berakhir}}</td>
                                    <td>{{$izin->alasan}}</td>
                                    <td>{{$izin->status}}</td>

                                </tr>
                            @empty
                            <tr>
                                <td colspan="4"><b><i>Belum Pernah Absen</i></b></tf>
                            </tr>
                            @endforelse
                        </tbody>
                  </table>
                  {!! $data_izin->links() !!}
                </div>
            </div>
        </div>
    </div>

</div>


@endsection