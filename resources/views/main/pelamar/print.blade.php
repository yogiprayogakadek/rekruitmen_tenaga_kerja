@extends('templates.master')

@section('title', 'Pelamar')

@section('content')
<div class="row printableArea">
    <div class="col-md-12">
        <h3 style="text-align: center">
            <b>Data Pelamar</b>
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
                        <th>Nama</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Alamat</th>
                        <th>Berat Badan</th>
                        <th>Tinggi Badan</th>
                        <th>Marital Status</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @foreach ($pelamar as $pelamar)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$pelamar->nama}}</td>
                            <td>{{$pelamar->tempat_lahir}}, {{$pelamar->tanggal_lahir}}</td>
                            <td>{{$pelamar->jenis_kelamin == 1 ? 'Laki - Laki' : 'Perempuan'}}</td>
                            <td>{{$pelamar->agama}}</td>
                            <td>{{$pelamar->alamat}}</td>
                            <td>{{$pelamar->berat_badan}} kg</td>
                            <td>{{$pelamar->tinggi_badan}} cm</td>
                            <td>{{$pelamar->marital_status}}</td>
                            <td>{{$pelamar->status == 1 ? 'Aktif' : 'Tidak Aktif'}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection