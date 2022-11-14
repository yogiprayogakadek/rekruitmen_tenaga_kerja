<div class="col-12">
    <form id="formEdit">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Ubah Pengumuman
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
                    <input type="hidden" name="id" id="id" class="id" value="{{$pengumuman->id}}">
                    <label for="perihal">Perihal</label>
                    <input type="text" class="form-control perihal" name="perihal" id="perihal" placeholder="masukkan perihal pengumuman" value="{{$pengumuman->perihal}}">
                    <div class="invalid-feedback error-perihal"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control deskripsi" name="deskripsi" id="deskripsi" placeholder="masukkan deskripsi pengumuman">{{$pengumuman->deskripsi}}</textarea>
                    <div class="invalid-feedback error-deskripsi"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="foto">File</label>
                    <input type="file" class="form-control file" name="file" id="file">
                    <span class="text-small">kosongkan apabila tidak ingin mengganti file pengumuman</span>
                    <div class="invalid-feedback error-file"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="deskripsi">Status</label>
                    <select id="ForminputState status" class="form-select status" name="status" data-choices data-choices-sorting="true">
                        <option value="">Pilih status...</option>
                        <option value="1" {{$pengumuman->status == 1 ? 'selected' : ''}}>Aktif</option>
                        <option value="0" {{$pengumuman->status == 0 ? 'selected' : ''}}>Tidak Aktif</option>
                    </select>
                    {{-- <select name="status" id="status" class="form-select status">
                        <option value="">Pilih status...</option>
                        <option value="1" {{$pengumuman->status == 1 ? 'selected' : ''}}>Aktif</option>
                        <option value="0" {{$pengumuman->status == 0 ? 'selected' : ''}}>Tidak Aktif</option>
                    </select> --}}
                    <div class="invalid-feedback error-status"></div>
                </div>
            </div>
            @if (Auth::guard('weboperator')->user()->role == 'Petugas')
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
            @endif
        </div>
    </form>
</div>