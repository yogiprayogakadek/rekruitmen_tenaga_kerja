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
    @foreach ($jadwal as $data)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <img class="img-fluid" src="{{asset($data->lamaran->lowongan->foto)}}" width="300px">
                    </div>
                    <div class="col-8">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="text-uppercase">Nama Lowongan</td>
                                    <td>{{$data->lamaran->lowongan->nama}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Posisi</td>
                                    <td>{{$data->lamaran->posisi}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Tanggal Pra Interview</td>
                                    <td>{{\Carbon\Carbon::createFromFormat('Y-m-d',$data->tanggal_prainterview)->format('d-m-Y')}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Lokasi Pra Interview</td>
                                    <td>{{$data->lokasi_prainterview}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Jam Pra Interview</td>
                                    <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$data->jam_prainterview)->format('H:i')}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Tanggal Final Interview</td>
                                    <td>{{$data->tanggal_finalinterview == '' ? 'Belum diatur' : \Carbon\Carbon::createFromFormat('Y-m-d',$data->tanggal_finalinterview)->format('d-m-Y')}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Lokasi Final Interview</td>
                                    <td>{{$data->lokasi_finalinterview == '' ? 'Belum diatur' : $data->lokasi_finalinterview}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Jam Final Interview</td>
                                    <td>{{$data->jam_finalinterview == '' ? 'Belum diatur' : \Carbon\Carbon::createFromFormat('H:i:s',$data->jam_finalinterview)->format('H:i')}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Keterangan</td>
                                    <td>{{$data->keterangan}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-center">
        {!! $jadwal->links() !!}
    </div>
</div>
