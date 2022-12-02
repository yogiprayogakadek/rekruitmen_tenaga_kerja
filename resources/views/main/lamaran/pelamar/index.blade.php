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
    {{-- @foreach ($lamaran as $data)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <img class="img-fluid" src="{{asset($data->lowongan->foto)}}" width="300px">
                    </div>
                    <div class="col-8">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="text-uppercase">Nama Lowongan</td>
                                    <td>{{$data->lowongan->nama}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Posisi</td>
                                    <td>{{$data->posisi}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Tanggal Daftar</td>
                                    <td>{{$data->updated_at->format('d-m-Y')}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Keterangan</td>
                                    <td>{{$data->keterangan ?? '-'}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Status</td>
                                    <td>
                                        @if ($data->status == '')
                                        Menunggu Validasi
                                        @elseif ($data->status == 1)
                                        Disetujui
                                        @elseif ($data->status == 2)
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
    @endforeach --}}

    @forelse ($lamaran as $data)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <img class="img-fluid" src="{{asset($data->lowongan->foto)}}" width="300px">
                    </div>
                    <div class="col-8">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="text-uppercase">Nama Lowongan</td>
                                    <td>{{$data->lowongan->nama}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Posisi</td>
                                    <td>{{$data->posisi}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Tanggal Daftar</td>
                                    <td>{{$data->updated_at->format('d-m-Y')}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Keterangan</td>
                                    <td>{{$data->keterangan ?? '-'}}</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase">Status</td>
                                    <td>
                                        @if ($data->status == '')
                                        Menunggu Validasi
                                        @elseif ($data->status == 1)
                                        Disetujui
                                        @elseif ($data->status == 2)
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
    @empty
        <div class="card">
            <div class="card-body">
                <div class="alert alert-danger card-title text-center">
                    Tidak ada data lamaran.
                </div>
            </div>
        </div>
    @endforelse

    <div class="d-flex justify-content-center">
        {!! $lamaran->links() !!}
    </div>
</div>

