<style>
    td {
    padding-top:5px;
    padding-bottom:5px;
    padding-right:5px;
    }

    td:first-child {
    padding-left:5px;
    padding-right:30px;
    }
</style>
<div class="col-12">
    @foreach ($lamaran as $lamaran)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <img class="img-fluid" src="{{asset($lamaran->lowongan->foto)}}" width="300px">
                    </div>
                    <div class="col-8">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="text-uppercase">Nama Lowongan</td>
                                    <td>{{$lamaran->lowongan->nama}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Posisi</td>
                                    <td>{{$lamaran->posisi}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Tanggal Daftar</td>
                                    <td>{{$lamaran->updated_at->format('d-m-Y')}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Keterangan</td>
                                    <td>{{$lamaran->keterangan ?? '-'}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Status</td>
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
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

