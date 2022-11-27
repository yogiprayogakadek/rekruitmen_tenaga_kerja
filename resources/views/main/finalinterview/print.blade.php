@extends('templates.master')

@section('title', 'Final Interview')

@section('content')
<div class="row printableArea">
    <div class="col-md-12">
        <h3 style="text-align: center">
            <b>Data Final Interview</b>
        </h3>
        <div class="pull-right text-end">
            <address>
                <p class="m-t-30">
                    <img src="{{asset('assets/uploads/images/logo.png')}}" height="100">
                </p>
                <p class="m-t-30">
                    <b>Dicetak oleh :</b>
                    <i class="fa fa-user"></i> {{Auth::guard('weboperator')->user()->nama}}
                </p>
                <p class="m-t-30">
                    <b>Tanggal Laporan :</b>
                    <i class="fa fa-calendar"></i> {{date('d-m-Y')}}
                </p>
            </address>
        </div>
    </div>
    <div class="col-md-12 mt-4">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-striped" id="tableData">
                    <thead>
                        <th>No</th>
                        <th>Pelamar</th>
                        <th>Nama dan Posisi</th>
                        <th>Jadwal</th>
                        <th>Nama Penempatan</th>
                        <th>Hasil</th>
                        <th>Posisi Akhir</th>
                        <th>Catatan</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @foreach ($finalinterview as $finalinterview)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$finalinterview->jadwal->lamaran->pelamar->nama}}</td>
                            <td>{{$finalinterview->jadwal->lamaran->lowongan->nama}} - {{$finalinterview->jadwal->lamaran->posisi}}</td>
                            <td>{{date_format(date_create($finalinterview->jadwal->tanggal_finalinterview),"d-m-Y")}}</td>
                            <td>{{$finalinterview->nama_penempatan}}</td>
                            <td>{{strtoupper($finalinterview->hasil)}}</td>
                            <td>{{$finalinterview->posisi}}</td>
                            <td>{{$finalinterview->catatan}}</td>
                            <td>{{$finalinterview->status == 1 ? 'Aktif' : 'Tidak Aktif'}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
