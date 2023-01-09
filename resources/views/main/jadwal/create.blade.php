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
                    <select name="lamaran" id="lamaran" class="form-select lamaran select-dropdown">
                        @foreach ($lamaran as $lamaran)
                            @if ($lamaran->lowongan != null)
                            <option value="{{$lamaran->id}}">{{$lamaran->pelamar->nama}} | {{$lamaran->lowongan->nama}} - {{$lamaran->posisi}}</option>
                            {{-- @else
                            <option value="">Tidak ada lamaran</option>
                            @break --}}
                            @endif
                        @endforeach
                    </select>
                    <div class="invalid-feedback error-lamaran"></div>
                </div>
                <div class="form-group mt-2">
                    <label for="prainterview">Tanggal Pra Interview</label>
                    <input type="date" name="prainterview" id="prainterview" class="form-control prainterview">
                    <div class="invalid-feedback error-prainterview"></div>
                </div>
                <div class="form-group mt-2">
                    <label for="jam">Jam Pra Interview</label>
                    <div class="row">
                        <div class="col-6">
                            <select name="jam" id="jam" class="form-select jam">
                                @for ($i = 1; $i < 25; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            <div class="invalid-feedback error-jam"></div>
                        </div>
                        <div class="col-6">
                            <select name="menit" id="menit" class="form-select menit">
                                @for ($j = 0; $j < 60; $j++)
                                    <option value="{{$j < 10 ? 0 . $j : $j}}">{{$j < 10 ? 0 . $j : $j}}</option>
                                @endfor
                            </select>
                            <div class="invalid-feedback error-menit"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="lokasi">Lokasi Pra Interview</label>
                    <input type="text" name="lokasi" id="lokasi" class="form-control lokasi" placeholder="masukkan lokasi pra interview">
                    <div class="invalid-feedback error-lokasi"></div>
                </div>
                <div class="form-group mt-2">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control keterangan" placeholder="masukkan keterangan"></textarea>
                    <div class="invalid-feedback error-keterangan"></div>
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
