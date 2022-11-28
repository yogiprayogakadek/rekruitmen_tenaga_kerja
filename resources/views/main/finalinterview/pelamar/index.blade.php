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
    @foreach ($finalinterview as $data)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <img class="img-fluid" src="{{asset($data->jadwal->lamaran->lowongan->foto)}}" width="300px">
                    </div>
                    <div class="col-8">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="text-uppercase">Nama Lowongan</td>
                                    <td>{{$data->jadwal->lamaran->lowongan->nama}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Posisi</td>
                                    <td>{{$data->jadwal->lamaran->posisi}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Jadwal</td>
                                    <td>{{date_format(date_create($data->jadwal->tanggal_finalinterview),"d-m-Y")}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Nama Penempatan</td>
                                    <td>{{$data->nama_penempatan}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Hasil</td>
                                    <td>{{$data->hasil}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Posisi Akhir</td>
                                    <td>{{strtoupper($data->posisi)}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Tanggal Pembaruan</td>
                                    <td>{{$data->updated_at->format('d-m-Y')}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-center">
        {!! $finalinterview->links() !!}
    </div>
</div>

