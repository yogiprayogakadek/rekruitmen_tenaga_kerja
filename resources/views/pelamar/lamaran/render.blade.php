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
                    <th>Posisi</th>
                    <th>Tanggal Daftar</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @foreach ($lamaran as $lamaran)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$lamaran->lowongan->nama}}</td>
                        <td>{{$lamaran->posisi}}</td>
                        <td>{{$lamaran->created_at->format('d M Y')}}</td>
                        <td>{{$lamaran->status == null ? 'Menunggu validasi' : ($lamaran->status == 1 ? 'Diterima' : 'Ditolak')}}</td>
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