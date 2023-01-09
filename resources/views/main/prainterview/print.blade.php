@extends('templates.master')

@section('title', 'Pra Interview')

@section('content')
<div class="row printableArea">
    <div class="col-md-12">
        <h3 style="text-align: center">
            <b>Data Pra Interview</b>
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
                        <th>Nama Lowongan</th>
                        <th>Pelamar</th>
                        <th>Posisi</th>
                        <th>Jadwal</th>
                        <th>Rekomendasi</th>
                        <th>Grade</th>
                        <th>Hasil</th>
                        <th>Tanggal Pembaruan</th>
                        <th>Catatan</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @foreach ($prainterview as $prainterview)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$prainterview->jadwal->lamaran->lowongan->nama}}</td>
                            <td>{{$prainterview->jadwal->lamaran->pelamar->nama}}</td>
                            <td>{{$prainterview->jadwal->lamaran->posisi}}</td>
                            <td>{{date_format(date_create($prainterview->jadwal->tanggal_prainterview),"d-m-Y")}}</td>
                            <td>{{$prainterview->rekomendasi}}</td>
                            <td>{{$prainterview->grade}}</td>
                            <td>{{strtoupper($prainterview->hasil)}}</td>
                            <td>{{$prainterview->updated_at->format('d-m-Y')}}</td>
                            <td>{{$prainterview->catatan}}</td>
                            <td>{{$prainterview->status == 1 ? 'Aktif' : 'Tidak Aktif'}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
