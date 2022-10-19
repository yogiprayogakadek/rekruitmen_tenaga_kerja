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
                    <input type="hidden" name="jadwal_id" value="{{$jadwal->id}}" id="jadwal_id">
                    <label for="lamaran">Lamaran</label>
                    <select name="lamaran" id="lamaran" class="form-select lamaran">
                        @foreach ($lamaran as $lamaran)
                            <option value="{{$lamaran->id}}">{{$lamaran->pelamar->nama}} | {{$lamaran->lowongan->nama}} - {{$lamaran->posisi}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback error-lamaran"></div>
                </div>
                <div class="form-group mt-2">
                    <label for="prainterview">Tanggal Prainterview</label>
                    <input type="date" value="{{$jadwal->tanggal_prainterview}}" name="prainterview" id="prainterview" class="form-control prainterview">
                    <div class="invalid-feedback error-prainterview"></div>
                </div>
                <div class="form-group mt-2">
                    <label for="finalinterview">Tanggal Final Interview</label>
                    <input type="date" name="finalinterview" id="finalinterview" class="form-control prainterview">
                    <span class="text-small text-muted">*kosongkan jika belum ada jadwal</span>
                    <div class="invalid-feedback error-finalinterview"></div>
                </div>
                <div class="form-group mt-2">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{$jadwal->status == 1 ? 'selected' : ''}}>Aktif</option>
                        <option value="0" {{$jadwal->status == 0 ? 'selected' : ''}}>Tidak Aktif</option>
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