<div class="col-12">
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    Data Jadwal Kerja
                </div>
                @if (Auth::guard('weboperator')->user())
                <div class="col-6 d-flex align-items-center">
                    <div class="m-auto"></div>
                    <button type="button" class="btn btn-outline-primary btn-add">
                        <i class="nav-icon i-Pen-2 font-weight-bold"></i> Tambah
                    </button>
                </div>
                @endif
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped" id="tableData">
                <thead>
                    <th>No</th>
                    <th>Nama Lowongan</th>
                    <th>Pelamar</th>
                    <th>Posisi</th>
                    <th>Tanggal Pra Interview</th>
                    <th>Lokasi Prainterview</th>
                    <th>Jam Prainterview</th>

                    <th>Tanggal Final Interview</th>
                    <th>Lokasi Final Interview</th>
                    <th>Jam Final Interview</th>
                    @if (Auth::guard('weboperator')->user())
                    <th>Status</th>
                    <th>Aksi</th>
                    @endif
                </thead>
                <tbody>
                    @foreach ($jadwal as $jadwal)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$jadwal->lamaran->lowongan->nama}}</td>
                        <td>{{$jadwal->lamaran->pelamar->nama}}</td>
                        <td>{{$jadwal->lamaran->posisi}}</td>
                        <td>{{$jadwal->tanggal_prainterview}}</td>
                        <td>{{$jadwal->lokasi_prainterview}}</td>
                        <td>{{$jadwal->jam_prainterview}}</td>
                        
                        <td>{{$jadwal->tanggal_finalinterview == '' ? 'Belum diatur' : $jadwal->tanggal_finalinterview}}</td>
                        <td>{{$jadwal->lokasi_finalinterview == '' ? 'Belum diatur' : $jadwal->lokasi_finalinterview}}</td>
                        <td>{{$jadwal->jam_finalinterview == '' ? 'Belum diatur' : $jadwal->jam_finalinterview}}</td>
                        @if (Auth::guard('weboperator')->user())
                        <td>{{$jadwal->status == 1 ? 'Aktif' : 'Tidak Aktif'}}</td>
                        <td>
                            <button class="btn btn-primary btn-edit" data-id="{{$jadwal->id}}"><i class="{{Auth::guard('weboperator')->user()->role == 'Petugas' ? 'ri-pencil-fill' : 'fa fa-eye'}}"></i></button>
                            {{-- <div class="dropdown d-inline-block">
                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-more-fill align-middle"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><button class="dropdown-item btn-edit" data-id="{{$jadwal->id}}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</button></li>
                                </ul>
                            </div> --}}
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