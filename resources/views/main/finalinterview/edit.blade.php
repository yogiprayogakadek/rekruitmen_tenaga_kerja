<div class="col-12">
    <form id="formEdit">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Ubah Hasil Interview
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
                    <input type="hidden" name="id" value="{{$final->id}}" id="id">
                    <label for="prainterview">Pelamar Lolos Prainterview</label>
                    <select name="jadwal" id="jadwal" class="form-select jadwal">
                        <option value="">Pilih nama pelamar...</option>
                        @foreach ($prainterview as $prainterview)
                            <option value="{{$prainterview->jadwal->id}}" {{$prainterview->jadwal->id == $final->jadwal_id ? 'selected' : ''}}>{{$prainterview->jadwal->lamaran->pelamar->nama}} | {{$prainterview->jadwal->lamaran->lowongan->nama}} - {{$prainterview->jadwal->lamaran->posisi}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback error-jadwal"></div>
                </div>
                <div class="form-group will-show mt-2">
                    <label for="rekomendasi">Rekomendasi</label>
                    <input type="text" name="rekomendasi" id="rekomendasi" class="form-control rekomendasi" value="{{$final->jadwal->prainterview->rekomendasi}}" disabled>
                    <div class="invalid-feedback error-rekomendasi"></div>
                </div>
                <div class="form-group will-show mt-2">
                    <label for="posisi">Posisi Final</label>
                    <select name="posisi" id="posisi" class="form-select posisi">
                        <option value="">Pilih posisi akhir...</option>
                        @foreach ($posisi as $posisi)
                            <option value="{{$posisi}}" {{$posisi == $final->posisi ? 'selected' : ''}}>{{$posisi}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback error-posisi"></div>
                </div>
                <div class="form-group will-show mt-2">
                    <label for="kapal">Nama Kapal</label>
                    <input type="text" name="kapal" id="kapal" class="form-control kapal" value="{{$final->nama_kapal}}">
                    <div class="invalid-feedback error-kapal"></div>
                </div>
                <div class="form-group mt-2 will-show mt-2">
                    <label for="hotel">Nama Hotel</label>
                    <input type="text" name="hotel" id="hotel" class="form-control hotel" value="{{$final->nama_hotel}}">
                    <div class="invalid-feedback error-hotel"></div>
                </div>
                <div class="form-group mt-2 will-show mt-2">
                    <label for="grade">Catatan</label>
                    <textarea name="catatan" id="catatan" class="form-control catatan">{{$final->catatan}}</textarea>
                    <div class="invalid-feedback error-catatan"></div>
                </div>
                <div class="form-group will-show mt-2">
                    <label for="hasil">Hasil</label>
                    <select name="hasil" id="hasil" class="form-select hasil">
                        <option value="lulus" {{$final->status == 'lulus' ? 'selected' : ''}}>Lulus</option>
                        <option value="tidak lulus" {{$final->status == 'tidak lulus' ? 'selected' : ''}}>Tidak Lulus</option>
                    </select>
                    <div class="invalid-feedback error-hasil"></div>
                </div>
                <div class="form-group mt-2">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{$final->status == 1 ? 'selected' : ''}}>Aktif</option>
                        <option value="0" {{$final->status == 0 ? 'selected' : ''}}>Tidak Aktif</option>
                    </select>
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