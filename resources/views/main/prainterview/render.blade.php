<div class="col-12">
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    Data Pra Interview
                </div>
                <div class="col-6 d-flex align-items-center">
                    <div class="m-auto"></div>
                    @if (Auth::guard('weboperator')->user())
                    <button style="margin-right: 5px" type="button" class="btn btn-outline-success btn-print">
                        <i class="fa fa-print fa-1x"></i>
                    </button>
                    @if (Auth::guard('weboperator')->user()->role == 'Petugas')
                    <button type="button" class="btn btn-outline-primary btn-add">
                        <i class="nav-icon i-Pen-2 font-weight-bold"></i> Tambah
                    </button>
                    @endif
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped" id="tableData">
                <thead>
                    <th>No</th>
                    <th>Pelamar</th>
                    <th>Nama dan Posisi</th>
                    <th>Jadwal</th>
                    <th>Rekomendasi</th>
                    <th>Grade</th>
                    {{-- <th>Catatan</th> --}}
                    <th>Hasil</th>
                    <th>Tanggal Pembaruan</th>
                    @if (Auth::guard('weboperator')->user())
                    @if (Auth::guard('weboperator')->user()->role == 'Petugas')
                    <th>Status</th>
                    @endif
                    @endif
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($prainterview as $prainterview)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <span style="cursor: pointer;" class="btn-pelamar" data-id="{{$prainterview->jadwal->lamaran->pelamar->id}}">{{$prainterview->jadwal->lamaran->pelamar->nama}}</span>
                        </td>
                        <td>{{$prainterview->jadwal->lamaran->lowongan->nama}} -
                            {{$prainterview->jadwal->lamaran->posisi}}</td>
                        <td>{{date_format(date_create($prainterview->jadwal->tanggal_prainterview),"d-m-Y")}}</td>
                        {{-- <td>{{$prainterview->jadwal->tanggal_prainterview}}</td> --}}
                        <td>{{$prainterview->rekomendasi}}</td>
                        <td>{{$prainterview->grade}}</td>
                        {{-- <td>{{$prainterview->catatan}}</td> --}}
                        <td>{{strtoupper($prainterview->hasil)}}</td>
                        <td>{{$prainterview->updated_at->format('d-m-Y')}}</td>
                        @if (Auth::guard('weboperator')->user())
                        @if (Auth::guard('weboperator')->user()->role == 'Petugas')
                        <td>{{$prainterview->status == 1 ? 'Aktif' : 'Tidak Aktif'}}</td>
                        @endif
                        <td>
                            <button class="btn btn-primary btn-edit" data-id="{{$prainterview->id}}"
                                data-rekomendasi="{{$prainterview->rekomendasi}}"
                                data-select="{{$prainterview->jadwal->lamaran_id}}"><i
                                    class="{{Auth::guard('weboperator')->user()->role == 'Petugas' ? 'ri-pencil-fill' : 'fa fa-eye'}}"></i></button>

                        </td>
                        @endif
                        @if (!Auth::guard('weboperator')->user())
                        <td>
                            <button class="btn btn-primary btn-edit" data-id="{{$prainterview->id}}"
                                data-rekomendasi="{{$prainterview->rekomendasi}}"
                                data-select="{{$prainterview->jadwal->lamaran_id}}"><i class="fa fa-eye"></i></button>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $('#tableData').DataTable();

</script>
