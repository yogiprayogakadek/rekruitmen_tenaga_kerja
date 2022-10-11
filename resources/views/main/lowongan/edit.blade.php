<div class="col-12">
    <form id="formEdit">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Ubah Lowongan Kerja
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
                    <input type="hidden" name="id" id="id" class="id" value="{{$lowongan->id}}">
                    <label for="nama">Nama Lowongan</label>
                    <input type="text" class="form-control nama" name="nama" id="nama" placeholder="masukkan nama lowongan" value="{{$lowongan->nama}}">
                    <div class="invalid-feedback error-nama"></div>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control foto" name="foto" id="foto">
                    <span class="text-small text-muted">*kosongkan jika tidak ingin mengganti foto</span>
                    <div class="invalid-feedback error-foto"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control deskripsi" name="deskripsi" id="deskripsi" placeholder="masukkan deskripsi lowongan">{{$lowongan->deskripsi}}</textarea>
                    <div class="invalid-feedback error-deskripsi"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="deskripsi">Status</label>
                    <select id="ForminputState status" class="form-select status" name="status" data-choices data-choices-sorting="true">
                        <option value="">Pilih status...</option>
                        <option value="1" {{$lowongan->status == 1 ? 'selected' : ''}}>Aktif</option>
                        <option value="0" {{$lowongan->status == 0 ? 'selected' : ''}}>Tidak Aktif</option>
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