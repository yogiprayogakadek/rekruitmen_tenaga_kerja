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
    @foreach ($prainterview as $prainterview)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <img class="img-fluid" src="{{asset($prainterview->jadwal->lamaran->lowongan->foto)}}" width="300px">
                    </div>
                    <div class="col-8">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="text-uppercase">Nama Lowongan</td>
                                    <td>{{$prainterview->jadwal->lamaran->lowongan->nama}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Posisi</td>
                                    <td>{{$prainterview->jadwal->lamaran->posisi}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Jadwal</td>
                                    <td>{{date_format(date_create($prainterview->jadwal->tanggal_prainterview),"d-m-Y")}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Rekomendasi</td>
                                    <td>{{$prainterview->rekomendasi}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Grade</td>
                                    <td>{{$prainterview->grade}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Hasil</td>
                                    <td>{{strtoupper($prainterview->hasil)}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Tanggal Pembaruan</td>
                                    <td>{{$prainterview->updated_at->format('d-m-Y')}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

