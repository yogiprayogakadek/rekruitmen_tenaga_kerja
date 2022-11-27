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
    @foreach ($jadwal as $jadwal)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <img class="img-fluid" src="{{asset($jadwal->lamaran->lowongan->foto)}}" width="300px">
                    </div>
                    <div class="col-8">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="text-uppercase">Nama Lowongan</td>
                                    <td>{{$jadwal->lamaran->lowongan->nama}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Posisi</td>
                                    <td>{{$jadwal->lamaran->posisi}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Tanggal Pra Interview</td>
                                    <td>{{\Carbon\Carbon::createFromFormat('Y-m-d',$jadwal->tanggal_prainterview)->format('d-m-Y')}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Lokasi Pra Interview</td>
                                    <td>{{$jadwal->lokasi_prainterview}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Jam Pra Interview</td>
                                    <td>{{\Carbon\Carbon::createFromFormat('H:i:s',$jadwal->jam_prainterview)->format('H:i')}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Tanggal Final Interview</td>
                                    <td>{{$jadwal->tanggal_finalinterview == '' ? 'Belum diatur' : \Carbon\Carbon::createFromFormat('Y-m-d',$jadwal->tanggal_finalinterview)->format('d-m-Y')}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Lokasi Final Interview</td>
                                    <td>{{$jadwal->lokasi_finalinterview == '' ? 'Belum diatur' : $jadwal->lokasi_finalinterview}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Jam Final Interview</td>
                                    <td>{{$jadwal->jam_finalinterview == '' ? 'Belum diatur' : \Carbon\Carbon::createFromFormat('H:i:s',$jadwal->jam_finalinterview)->format('H:i')}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Keterangan</td>
                                    <td>{{$jadwal->keterangan}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
