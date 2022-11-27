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
    @foreach ($finalinterview as $finalinterview)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <img class="img-fluid" src="{{asset($finalinterview->jadwal->lamaran->lowongan->foto)}}" width="300px">
                    </div>
                    <div class="col-8">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="text-uppercase">Nama Lowongan</td>
                                    <td>{{$finalinterview->jadwal->lamaran->lowongan->nama}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Posisi</td>
                                    <td>{{$finalinterview->jadwal->lamaran->posisi}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Jadwal</td>
                                    <td>{{date_format(date_create($finalinterview->jadwal->tanggal_finalinterview),"d-m-Y")}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Nama Penempatan</td>
                                    <td>{{$finalinterview->nama_penempatan}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Hasil</td>
                                    <td>{{$finalinterview->hasil}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Posisi Akhir</td>
                                    <td>{{strtoupper($finalinterview->posisi)}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Tanggal Pembaruan</td>
                                    <td>{{$finalinterview->updated_at->format('d-m-Y')}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

