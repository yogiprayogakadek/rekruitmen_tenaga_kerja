<div class="col-12">
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    Data Lowongan
                </div>
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
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped" id="tableData">
                <thead>
                    <th>No</th>
                    <th>Nama Lowongan</th>
                    <th>Posisi</th>
                    <th>Foto</th>
                    <th>Deskripsi</th>
                    <th>Petugas</th>
                    @if (Auth::guard('weboperator')->user()->role == 'Petugas')
                    <th>Status</th>
                    <th>Aksi</th>
                    @endif
                </thead>
                <tbody>
                    @foreach ($lowongan as $lowongan)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$lowongan->nama}}</td>
                        <td>
                            <ul>
                                @foreach (explode(',', $lowongan->posisi) as $item)
                                    <li>{{$item}}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <img src="{{asset($lowongan->foto)}}" width="150px">
                        </td>
                        <td>{{$lowongan->deskripsi}}</td>
                        <td>{{$lowongan->user->nama}}</td>
                        @if (Auth::guard('weboperator')->user()->role == 'Petugas')
                        <td>{{$lowongan->status == 1 ? 'Aktif' : 'Tidak Aktif'}}</td>
                        <td>
                            <button class="btn btn-primary btn-edit" data-id="{{$lowongan->id}}"><i class="{{Auth::guard('weboperator')->user()->role == 'Petugas' ? 'ri-pencil-fill' : 'fa fa-eye'}}"></i></button>
                            {{-- <div class="dropdown d-inline-block">
                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-more-fill align-middle"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><button class="dropdown-item btn-edit" data-id="{{$lowongan->id}}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</button></li>
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