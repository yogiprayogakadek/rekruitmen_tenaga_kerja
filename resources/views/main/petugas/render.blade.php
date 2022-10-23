<div class="col-12">
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    Data Petugas
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
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($petugas as $petugas)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$petugas->nama}}</td>
                        <td>{{$petugas->telepon}}</td>
                        <td>{{$petugas->tempat_lahir}}, {{$petugas->tanggal_lahir}}</td>
                        <td><img src="{{$petugas->foto}}" width="70px"></td>
                        <td>{{$petugas->status == 1 ? 'Aktif' : 'Tidak Aktif'}}</td>
                        <td>
                            <div class="dropdown d-inline-block">
                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-more-fill align-middle"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><button class="dropdown-item btn-edit" data-id="{{$petugas->id}}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</button></li>
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