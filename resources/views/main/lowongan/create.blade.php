<div class="col-12">
    <form id="formAdd">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Tambah Lowongan Kerja
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
                    <label for="nama">Nama Lowongan</label>
                    <input type="text" class="form-control nama" name="nama" id="nama" placeholder="masukkan nama lowongan kerja">
                    <div class="invalid-feedback error-nama"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="posisi">Posisi</label>
                    <textarea class="form-control posisi" name="posisi" id="posisi" placeholder="masukkan posisi"></textarea>
                    <span class="text-muted text small">*gunakan tanda koma (,) sebagai pemisah</span>
                    <div class="invalid-feedback error-posisi"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control deskripsi" name="deskripsi" id="deskripsi" placeholder="masukkan deskripsi"></textarea>
                    <div class="invalid-feedback error-deskripsi"></div>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control foto" name="foto" id="foto">
                    <div class="invalid-feedback error-foto"></div>
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