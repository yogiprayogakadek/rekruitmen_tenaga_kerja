<div class="col-12">
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    Data Lamaran
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped" id="tableData">
                <thead>
                    <th>No</th>
                    <th>Nama Lowongan</th>
                    <th>Pelamar</th>
                    <th>Posisi</th>
                    <th>Tanggal Daftar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($lamaran as $lamaran)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$lamaran->lowongan->nama}}</td>
                        <td>{{$lamaran->pelamar->nama}}</td>
                        <td>{{$lamaran->posisi}}</td>
                        <td>{{$lamaran->created_at->format('d M Y')}}</td>
                        <td>{{$lamaran->status == '' ? 'Menunggu validasi' : ($lamaran->status == 1 ? 'Diterima' : 'Ditolak')}}</td>
                        <td>
                            <div class="dropdown d-inline-block">
                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-more-fill align-middle"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><button class="dropdown-item btn-edit" data-id="{{$lamaran->id}}" data-status={{$lamaran->status}}><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</button></li>
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

{{-- modal upload --}}
<div class="live-preview">
    <div>
        <div class="modal fade" id="modalStatus" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Status</h5>
                    </div>
                    <form id="formStatus">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="lamaran_id" id="lamaran-id">
                            <select class="form-select mb-3 status" name="status">
                                <option value="">Menunggu Validasi</option>
                                <option value="1">Diterima</option>
                                <option value="0">Ditolak</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary btn-update">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#tableData').DataTable();
</script>