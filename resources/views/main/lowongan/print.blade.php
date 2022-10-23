@extends('templates.master')

@section('title', 'Lowongan Kerja')

@section('content')
<div class="row printableArea">
    <div class="col-md-12">
        <h3 style="text-align: center">
            <b>Data Lowongan Kerja</b>
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
                        <th>Posisi</th>
                        <th>Foto</th>
                        <th>Deskripsi</th>
                        <th>Petugas</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @foreach ($lowongan as $lowongan)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$lowongan->nama}}</td>
                            <td>
                                @foreach (explode(',', $lowongan->posisi) as $item)
                                    <ul><li>{{$item}}</li></ul>
                                @endforeach
                            </td>
                            <td>
                                <img src="{{asset($lowongan->foto)}}" width="150px">
                            </td>
                            <td>{{$lowongan->deskripsi}}</td>
                            <td>{{$lowongan->user->nama}}</td>
                            <td>{{$lowongan->status == 1 ? 'Aktif' : 'Tidak Aktif'}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection