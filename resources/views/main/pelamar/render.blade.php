<div class="col-12">
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    Data Pelamar
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped" id="tableData">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Berat Badan</th>
                    <th>Tinggi Badan</th>
                    <th>Marital Status</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($pelamar as $pelamar)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$pelamar->nama}}</td>
                        <td>{{$pelamar->tempat_lahir}}, {{$pelamar->tanggal_lahir}}</td>
                        <td>{{$pelamar->jenis_kelamin == 1 ? 'Laki - Laki' : 'Perempuan'}}</td>
                        <td>{{$pelamar->agama}}</td>
                        <td>{{$pelamar->alamat}}</td>
                        <td>{{$pelamar->berat_badan}}</td>
                        <td>{{$pelamar->tinggi_badan}}</td>
                        <td>{{$pelamar->marital_status}}</td>
                        <td>{{$pelamar->status == 1 ? 'Aktif' : 'Tidak Aktif'}}</td>
                        <td>
                            <div class="dropdown d-inline-block">
                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-more-fill align-middle"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    {{-- <li><a href="#!" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li> --}}
                                    <li><button class="dropdown-item btn-edit" data-id="{{$pelamar->id}}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</button></li>
                                    {{-- <li>
                                        <a class="dropdown-item remove-item-btn">
                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                                        </a>
                                    </li> --}}
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