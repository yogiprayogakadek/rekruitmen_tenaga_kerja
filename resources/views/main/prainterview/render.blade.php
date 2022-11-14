<div class="col-12">
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    Data Pra Interview
                </div>
                @if (Auth::guard('weboperator')->user())
                @if (Auth::guard('weboperator')->user()->role == 'Petugas')
                <div class="col-6 d-flex align-items-center">
                    <div class="m-auto"></div>
                    <button style="margin-right: 5px" type="button" class="btn btn-outline-success btn-print">
                        <i class="fa fa-print fa-1x"></i>
                    </button>
                    <button type="button" class="btn btn-outline-primary btn-add">
                        <i class="nav-icon i-Pen-2 font-weight-bold"></i> Tambah
                    </button>
                </div>
                @endif
                @endif
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped">
                <thead>
                    <th>No</th>
                    <th>Pelamar</th>
                    <th>Nama dan Posisi</th>
                    <th>Jadwal</th>
                    <th>Rekomendasi</th>
                    <th>Grade</th>
                    {{-- <th>Catatan</th> --}}
                    <th>Hasil</th>
                    <th>Tanggal Perubahan</th>
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
                        <td>{{$prainterview->jadwal->lamaran->pelamar->nama}}</td>
                        <td>{{$prainterview->jadwal->lamaran->lowongan->nama}} - {{$prainterview->jadwal->lamaran->posisi}}</td>
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
                            <td>
                                <button class="btn btn-primary btn-edit" data-id="{{$prainterview->id}}" data-rekomendasi="{{$prainterview->rekomendasi}}" data-select="{{$prainterview->jadwal->lamaran_id}}"><i class="{{Auth::guard('weboperator')->user()->role == 'Petugas' ? 'ri-pencil-fill' : 'fa fa-eye'}}"></i></button>
                                {{-- <div class="dropdown d-inline-block">
                                    <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-more-fill align-middle"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><button class="dropdown-item btn-edit" data-id="{{$prainterview->id}}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</button></li>
                                    </ul>
                                </div> --}}
                            </td>
                            @endif
                        @endif
                        @if (!Auth::guard('weboperator')->user())
                        <td>
                            <button class="btn btn-primary btn-edit" data-id="{{$prainterview->id}}" data-rekomendasi="{{$prainterview->rekomendasi}}" data-select="{{$prainterview->jadwal->lamaran_id}}"><i class="fa fa-eye"></i></button>
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