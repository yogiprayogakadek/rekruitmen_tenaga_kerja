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
    {{-- @foreach ($prainterview as $data)
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
                                    <td>{{date_format(date_create($data->jadwal->tanggal_prainterview),"d-m-Y")}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Rekomendasi</td>
                                    <td>{{$data->rekomendasi}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Grade</td>
                                    <td>{{$data->grade}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Hasil</td>
                                    <td>{{strtoupper($data->hasil)}}</td>
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
    @endforeach --}}

    @forelse ($prainterview as $data)
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
                                    <td>{{date_format(date_create($data->jadwal->tanggal_prainterview),"d-m-Y")}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Rekomendasi</td>
                                    <td>{{$data->rekomendasi}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Grade</td>
                                    <td>{{$data->grade}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Hasil</td>
                                    <td>{{strtoupper($data->hasil)}}</td>
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
    @empty
        <div class="card">
            <div class="card-body">
                <div class="alert alert-danger card-title text-center">
                    Tidak ada data prainterview.
                </div>
            </div>
        </div>
    @endforelse

    <div class="d-flex justify-content-center">
        {!! $prainterview->links() !!}
    </div>
</div>

