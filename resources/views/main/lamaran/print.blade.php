@extends('templates.master')

@section('title', 'Lamaran')

@section('content')
<div class="row printableArea">
    <div class="col-md-12">
        <h3 style="text-align: center">
            <b>Data Lamaran</b>
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
                        <th>Tanggal Daftar</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                    </thead>
                    <tbody>
                        @foreach ($lamaran as $lamaran)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$lamaran->lowongan->nama}}</td>
                            <td>{{$lamaran->pelamar->nama}}</td>
                            <td>{{$lamaran->posisi}}</td>
                            <td>{{$lamaran->updated_at->format('d-m-Y')}}</td>
                            <td>
                                @if ($lamaran->status == '')
                                Menunggu Validasi
                                @elseif ($lamaran->status == 1)
                                Disetujui
                                @elseif ($lamaran->status == 2)
                                Dipending
                                @else
                                Ditolak
                                @endif
                            </td>
                            <td>{{$lamaran->keterangan ?? '-'}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
