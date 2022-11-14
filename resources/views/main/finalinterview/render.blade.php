<div class="col-12">
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    Data Final Interview
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
            <table class="table table-hover table-striped" id="tableData">
                <thead>
                    <th>No</th>
                    <th>Pelamar</th>
                    <th>Nama dan Posisi</th>
                    <th>Jadwal</th>
                    <th>Nama Penempatan</th>
                    {{-- <th>Catatan</th> --}}
                    <th>Hasil</th>
                    <th>Posisi Akhir</th>
                    <th>Tanggal Perubahan</th>
                    @if (Auth::guard('weboperator')->user())
                    @if (Auth::guard('weboperator')->user()->role == 'Petugas')
                    <th>Status</th>
                    @endif
                    @endif
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($finalinterview as $finalinterview)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$finalinterview->jadwal->lamaran->pelamar->nama}}</td>
                        <td>{{$finalinterview->jadwal->lamaran->lowongan->nama}} - {{$finalinterview->jadwal->lamaran->posisi}}</td>
                        {{-- <td>{{$finalinterview->jadwal->tanggal_prainterview}}</td> --}}
                        <td>{{date_format(date_create($finalinterview->jadwal->tanggal_prainterview),"d-m-Y")}}</td>
                        <td>{{$finalinterview->nama_penempatan}}</td>
                        {{-- <td>{{$finalinterview->catatan}}</td> --}}
                        <td>{{strtoupper($finalinterview->hasil)}}</td>
                        <td>{{$finalinterview->posisi}}</td>
                        <td>{{$finalinterview->updated_at->format('d-m-Y')}}</td>
                        @if (Auth::guard('weboperator')->user())
                        @if (Auth::guard('weboperator')->user()->role == 'Petugas')
                        <td>{{$finalinterview->status == 1 ? 'Aktif' : 'Tidak Aktif'}}</td>
                        <td>
                            <button class="btn btn-primary btn-edit" data-id="{{$finalinterview->id}}" data-posisi="{{$finalinterview->posisi}}" data-select="{{$finalinterview->jadwal->lamaran_id}}"><i class="{{Auth::guard('weboperator')->user()->role == 'Petugas' ? 'ri-pencil-fill' : 'fa fa-eye'}}"></i></button>
                            {{-- <div class="dropdown d-inline-block">
                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-more-fill align-middle"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><button class="dropdown-item btn-edit" data-id="{{$finalinterview->id}}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</button></li>
                                </ul>
                            </div> --}}
                        </td>
                    </tr>
                        @endif
                        @endif
                    @if (!Auth::guard('weboperator')->user())
                        <td>
                            <button class="btn btn-primary btn-edit" data-id="{{$finalinterview->id}}" data-rekomendasi="{{$finalinterview->rekomendasi}}" data-select="{{$finalinterview->jadwal->lamaran_id}}"><i class="fa fa-eye"></i></button>
                        </td>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $('#tableData').DataTable();
</script>