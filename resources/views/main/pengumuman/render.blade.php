<div class="col-12">
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    Data Pengumuman
                </div>
                @if (Auth::guard('weboperator')->user())
                @if (Auth::guard('weboperator')->user()->role == 'Petugas')
                <div class="col-6 d-flex align-items-center">
                    <div class="m-auto"></div>
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
                    <th>Perihal</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Pembuatan</th>
                    <th>Tanggal Pembaruan</th>
                    <th>File Pengumuman</th>
                    @if (Auth::guard('weboperator')->user())
                    @if (Auth::guard('weboperator')->user()->role == 'Petugas')
                    <th>Status</th>
                    <th>Aksi</th>
                    @endif
                    @endif
                </thead>
                <tbody>
                    @foreach ($pengumuman as $pengumuman)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$pengumuman->perihal}}</td>
                        <td>{{$pengumuman->deskripsi}}</td>
                        <td>{{$pengumuman->created_at->format('d-m-Y / H:i')}}</td>
                        <td>{{$pengumuman->updated_at->format('d-m-Y / H:i')}}</td>
                        <td>{!!$pengumuman->file != null ? '<a href="'.asset($pengumuman->file).'" target="_blank">Lihat</a>' : '-' !!}</td>
                        @if (Auth::guard('weboperator')->user())
                        @if (Auth::guard('weboperator')->user()->role == 'Petugas')
                        <td>{{$pengumuman->status == 1 ? 'Aktif' : 'Tidak Aktif'}}</td>
                        <td>
                            <button class="btn btn-primary btn-edit" data-id="{{$pengumuman->id}}"><i class="{{Auth::guard('weboperator')->user()->role == 'Petugas' ? 'ri-pencil-fill' : 'fa fa-eye'}}"></i></button>
                            {{-- <div class="dropdown d-inline-block"> --}}
                                {{-- <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-more-fill align-middle"></i>
                                </button> --}}
                                {{-- <ul class="dropdown-menu dropdown-menu-end"> --}}
                                    {{-- <li><a href="#!" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li> --}}
                                    {{-- <li><button class="dropdown-item btn-edit" data-id="{{$pengumuman->id}}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</button></li> --}}
                                    {{-- <li>
                                        <a class="dropdown-item remove-item-btn">
                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                        </a>
                                    </li> --}}
                                {{-- </ul> --}}
                            {{-- </div> --}}
                        </td>
                        @endif
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
