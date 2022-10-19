<div class="col-12">
    <form id="formAdd">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Tambah Jadwal Interview
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
                    <select name="lamaran" id="lamaran" class="form-select lamaran">
                        @foreach ($lamaran as $lamaran)
                            <option value="{{$lamaran->id}}">{{$lamaran->pelamar->nama}} | {{$lamaran->lowongan->nama}} - {{$lamaran->posisi}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback error-lamaran"></div>
                </div>
                <div class="form-group mt-2">
                    <label for="prainterview">Tanggal Prainterview</label>
                    <input type="date" name="prainterview" id="prainterview" class="form-control prainterview">
                    <div class="invalid-feedback error-prainterview"></div>
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