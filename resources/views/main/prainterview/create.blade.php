<div class="col-12">
    <form id="formAdd">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Tambah Hasil Pra Interview
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
                    <label for="lamaran">Lamaran</label>
                    <select name="lamaran" id="lamaran" class="form-select lamaran select-dropdown">
                        <option value="">Pilih nama pelamar...</option>
                        @foreach ($lamaran as $lamaran)
                            <option value="{{$lamaran->id}}">{{$lamaran->pelamar->nama}} | {{$lamaran->lowongan->nama}} - {{$lamaran->posisi}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback error-lamaran"></div>
                </div>
                <div class="form-group will-show mt-2">
                    <label for="rekomendasi">Rekomendasi</label>
                    <select name="rekomendasi" id="rekomendasi" class="form-select rekomendasi"></select>
                    <div class="invalid-feedback error-rekomendasi"></div>
                </div>
                <div class="form-group mt-2 will-show">
                    <label for="grade">Grade</label>
                    <input type="text" name="grade" id="grade" class="form-control grade">
                    <div class="invalid-feedback error-grade"></div>
                </div>
                <div class="form-group mt-2 will-show">
                    <label for="grade">Catatan</label>
                    <textarea name="catatan" id="catatan" class="form-control catatan"></textarea>
                    <div class="invalid-feedback error-catatan"></div>
                </div>
                <div class="form-group will-show">
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
