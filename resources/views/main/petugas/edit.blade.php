<div class="col-12">
    <form id="formEdit">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Ubah Data
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
                    <input type="hidden" name="id" id="id" value="{{$petugas->id}}">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control nama" name="nama" id="nama" placeholder="masukkan nama" value="{{$petugas->nama}}">
                    <div class="invalid-feedback error-nama"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="telepon">Telepon</label>
                    <input type="text" class="form-control telepon" name="telepon" id="telepon" placeholder="masukkan telepon" value="{{$petugas->telepon}}">
                    <div class="invalid-feedback error-telepon"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="tempat-lahir">Tempat Lahir</label>
                    <input type="text" class="form-control tempat_lahir" name="tempat_lahir" id="tempat-lahir" placeholder="masukkan tempat lahir" value="{{$petugas->tempat_lahir}}">
                    <div class="invalid-feedback error-tempat_lahir"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="tanggal-lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control tanggal_lahir" name="tanggal_lahir" id="tanggal-lahir" placeholder="masukkan tanggal lahir" value="{{$petugas->tanggal_lahir}}">
                    <div class="invalid-feedback error-tanggal_lahir"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control foto" name="foto" id="foto" placeholder="masukkan foto">
                    <span class="text-muted text-small">kosongkan jika tidak ingin mengubah foto</span>
                    <div class="invalid-feedback error-foto"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="deskripsi">Status</label>
                    <select id="ForminputState status" class="form-select status" name="status" data-choices data-choices-sorting="true">
                        <option value="">Pilih status...</option>
                        <option value="1" {{$petugas->status == 1 ? 'selected' : ''}}>Aktif</option>
                        <option value="0" {{$petugas->status == 0 ? 'selected' : ''}}>Tidak Aktif</option>
                    </select>
                    <div class="invalid-feedback error-status"></div>
                </div>
            </div>
            <div class="card-footer">
                <div class="mc-footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" class="btn  btn-primary m-1 btn-update">Simpan</button>
                            <button type="button" class="btn btn-outline-secondary m-1 btn-data">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>