<div class="col-12">
    <form id="formAdd">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Tambah Hasil Final Interview
                    </div>
                    <div class="col-6 d-flex align-items-center">
                        <div class="m-auto"></div>
                        <button type="button" class="btn btn-outline-primary btn-data">
                            <i class="nav-icon i-Pen-2 font-weight-bold"></i> Data
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="prainterview">Pelamar Lolos Pra Interview</label>
                    <select name="jadwal" id="jadwal" class="form-select jadwal select-dropdown">
                        <option value="">Pilih nama pelamar...</option>
                        @foreach ($prainterview as $prainterview)
                            <option value="{{$prainterview->jadwal->id}}">{{$prainterview->jadwal->lamaran->pelamar->nama}} | {{$prainterview->jadwal->lamaran->lowongan->nama}} - {{$prainterview->jadwal->lamaran->posisi}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback error-jadwal"></div>
                </div>
                <div class="form-group will-show mt-2">
                    <label for="rekomendasi">Rekomendasi</label>
                    <input type="text" name="rekomendasi" id="rekomendasi" class="form-control rekomendasi" disabled>
                    <div class="invalid-feedback error-rekomendasi"></div>
                </div>
                <div class="form-group will-show mt-2">
                    <label for="posisi">Posisi Akhir</label>
                    <select name="posisi" id="posisi" class="form-select posisi"></select>
                    <div class="invalid-feedback error-posisi"></div>
                </div>
                <div class="form-group will-show mt-2">
                    <label for="nama-penempatan">Nama Penempatan</label>
                    <input type="text" name="nama_penempatan" id="nama-penempatan" class="form-control nama_penempatan" placeholder="masukkan nama penempatan">
                    <div class="invalid-feedback error-nama_penempatan"></div>
                </div>
                <div class="form-group mt-2 will-show mt-2">
                    <label for="penempatan">Penempatan</label>
                    <select name="penempatan" id="penempatan" class="form-select penempatan">
                        <option value="cruise">Cruise</option>
                        <option value="darat">Darat</option>
                    </select>
                    <div class="invalid-feedback error-penempatan"></div>
                </div>
                <div class="form-group mt-2 will-show mt-2">
                    <label for="grade">Catatan</label>
                    <textarea name="catatan" id="catatan" class="form-control catatan"></textarea>
                    <div class="invalid-feedback error-catatan"></div>
                </div>
                <div class="form-group will-show mt-2">
                    <label for="hasil">Hasil</label>
                    <select name="hasil" id="hasil" class="form-select hasil">
                        <option value="lulus">Lulus</option>
                        <option value="tidak lulus">Tidak Lulus</option>
                    </select>
                    <div class="invalid-feedback error-hasil"></div>
                </div>
            </div>
            <div class="card-footer">
                <div class="mc-footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" class="btn  btn-primary m-1 btn-save">Simpan</button>
                            <button type="button" class="btn btn-outline-secondary m-1 btn-data">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function () {
        $('.select-dropdown').select2();
    });
</script>
