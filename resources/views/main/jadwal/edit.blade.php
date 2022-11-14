<div class="col-12">
    <form id="formEdit">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Ubah Jadwal Interview
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
                    <select name="lamaran" id="lamaran" class="form-select lamaran select-dropdown">
                        @foreach ($lamaran as $lamaran)
                            {{-- <option value="{{$lamaran->id}}">{{$lamaran->pelamar->nama}} | {{$lamaran->lowongan->nama}} - {{$lamaran->posisi}}</option> --}}
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
                    <label for="prainterview">Tanggal Prainterview</label>
                    <input type="date" value="{{$jadwal->tanggal_prainterview}}" name="prainterview" id="prainterview" class="form-control prainterview">
                    <div class="invalid-feedback error-prainterview"></div>
                </div>
                <div class="form-group mt-2">
                    @php
                        $jam_prainterview = explode(':', $jadwal->jam_prainterview)
                    @endphp
                    <label for="jam">Jam Prainterview</label>
                    <div class="row">
                        <div class="col-6">
                            <select name="jam" id="jam" class="form-select jam">
                                @for ($i = 0; $i < 24; $i++)
                                    <option value="{{$i}}" {{$i == $jam_prainterview[0] ? 'selected' : ''}}>{{$i}}</option>
                                @endfor
                            </select>
                            <div class="invalid-feedback error-jam"></div>
                        </div>
                        <div class="col-6">
                            <select name="menit" id="menit" class="form-select menit">
                                @for ($j = 0; $j < 60; $j++)
                                    <option value="{{$j < 10 ? 0 . $j : $j}}" {{$j == $jam_prainterview[1] ? 'selected' : ''}}>{{$j < 10 ? 0 . $j : $j}}</option>
                                @endfor
                            </select>
                            <div class="invalid-feedback error-menit"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="lokasi">Lokasi Prainterview</label>
                    <input type="text" name="lokasi" id="lokasi" class="form-control lokasi" value="{{$jadwal->lokasi_prainterview}}">
                    <div class="invalid-feedback error-lokasi"></div>
                </div>

                <div class="form-group mt-2">
                    <label for="finalinterview">Tanggal Final Interview</label>
                    <input type="date" name="finalinterview" id="finalinterview" class="form-control prainterview">
                    <span class="text-small text-muted">*kosongkan jika belum ada jadwal</span>
                    <div class="invalid-feedback error-finalinterview"></div>
                </div>
                <div class="form-group mt-2">
                    @php
                        $jam_finalinterview = explode(':', $jadwal->jam_finalinterview)
                        @endphp
                    <label for="jam-final">Jam Final Fnterview</label>
                    <div class="row">
                        <div class="col-6">
                            <select name="jam_final" id="jam-final" class="form-select jam_final">
                                @for ($m = 0; $m < 24; $m++)
                                <option value="{{$m}}">{{$m}}</option>
                                {{-- <option value="{{$m}}" {{$m == $jam_prainterview[0] ? 'selected' : ''}}>{{$m}}</option> --}}
                                @endfor
                            </select>
                            <div class="invalid-feedback error-jam_final"></div>
                        </div>
                        <div class="col-6">
                            <select name="menit_final" id="menit-final" class="form-select menit_final">
                                @for ($n = 0; $n < 60; $n++)
                                    <option value="{{$n < 10 ? 0 . $n : $n}}">{{$n < 10 ? 0 . $n : $n}}</option>
                                    {{-- <option value="{{$n < 10 ? 0 . $n : $n}}" {{$n == $jam_finalinterview[1] ? 'selected' : ''}}>{{$n < 10 ? 0 . $n : $n}}</option> --}}
                                @endfor
                            </select>
                            <div class="invalid-feedback error-menit_final"></div>
                        </div>
                    </div>
                    <span class="text-small text-muted">*kosongkan jika belum ada jadwal final interview</span>
                </div>
                <div class="form-group mt-2">
                    <label for="lokasi-final">Lokasi Final Interview</label>
                    <input type="text" name="lokasi_final" id="lokasi-final" class="form-control lokasi_final" value="{{$jadwal->lokasi_finalinterview}}">
                    <span class="text-small text-muted">*kosongkan jika belum ada jadwal final interview</span>
                    <div class="invalid-feedback error-lokasi_final"></div>
                </div>

                <div class="form-group mt-2">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control keterangan">{{$jadwal->keterangan}}</textarea>
                    <div class="invalid-feedback error-keterangan"></div>
                </div>
                <div class="form-group mt-2">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{$jadwal->status == 1 ? 'selected' : ''}}>Aktif</option>
                        <option value="0" {{$jadwal->status == 0 ? 'selected' : ''}}>Tidak Aktif</option>
                    </select>
                </div>
            </div>
            {{-- @if (Auth::guard('weboperator')->user()) --}}
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
            {{-- @endif --}}
        </div>
    </form>
</div>

<script>
    $(document).ready(function () {
        $('.select-dropdown').select2();
    });
</script>