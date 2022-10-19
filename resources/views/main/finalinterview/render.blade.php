<div class="col-12">
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    Data Pra Interview
                </div>
                <div class="col-6 d-flex align-items-center">
                    <div class="m-auto"></div>
                    <button type="button" class="btn btn-outline-primary btn-add">
                        <i class="nav-icon i-Pen-2 font-weight-bold"></i> Tambah
                    </button>
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
                    <th>Nama Kapal</th>
                    <th>Nama Hotel</th>
                    <th>Catatan</th>
                    <th>Hasil</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($finalinterview as $finalinterview)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$finalinterview->jadwal->lamaran->pelamar->nama}}</td>
                        <td>{{$finalinterview->jadwal->lamaran->lowongan->nama}} - {{$finalinterview->jadwal->lamaran->posisi}}</td>
                        <td>{{$finalinterview->jadwal->tanggal_finalinterview}}</td>
                        <td>{{$finalinterview->nama_kapal}}</td>
                        <td>{{$finalinterview->nama_hotel}}</td>
                        <td>{{$finalinterview->catatan}}</td>
                        <td>{{strtoupper($finalinterview->hasil)}}</td>
                        <td>{{$finalinterview->status == 1 ? 'Aktif' : 'Tidak Aktif'}}</td>
                        <td>
                            <div class="dropdown d-inline-block">
                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-more-fill align-middle"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><button class="dropdown-item btn-edit" data-id="{{$finalinterview->id}}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</button></li>
                                </ul>
                            </div>
                        </td>
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