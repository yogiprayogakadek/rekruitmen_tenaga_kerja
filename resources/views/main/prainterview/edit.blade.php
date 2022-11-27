<div class="col-12">
    <form id="formEdit">
        @csrf
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Data Hasil Pra Interview
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
                    <input type="hidden" name="prainterview_id" value="{{$prainterview->id}}" id="prainterview-id">
                    <label for="lamaran">Lamaran</label>
                    <select name="lamaran" id="lamaran" class="form-select lamaran select-dropdown" {{!Auth::guard('weboperator')->user() ? 'disabled' : (Auth::guard('weboperator')->user()->role != 'Petugas' ? 'disabled' : '')}}>
                        @foreach ($lamaran as $lamaran)
                            <option value="{{$lamaran->id}}">{{$lamaran->pelamar->nama}} | {{$lamaran->lowongan->nama}} - {{$lamaran->posisi}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback error-lamaran"></div>
                </div>
                <div class="form-group will-show mt-2">
                    <label for="rekomendasi">Rekomendasi</label>
                    <select name="rekomendasi" id="rekomendasi" class="form-select rekomendasi" {{!Auth::guard('weboperator')->user() ? 'disabled' : (Auth::guard('weboperator')->user()->role != 'Petugas' ? 'disabled' : '')}}></select>
                    <div class="invalid-feedback error-rekomendasi"></div>
                </div>
                <div class="form-group mt-2 will-show">
                    <label for="grade">Grade</label>
                    <input type="text" name="grade" id="grade" class="form-control grade" value="{{$prainterview->grade}}" {{!Auth::guard('weboperator')->user() ? 'disabled' : (Auth::guard('weboperator')->user()->role != 'Petugas' ? 'disabled' : '')}}>
                    <div class="invalid-feedback error-grade"></div>
                </div>
                <div class="form-group mt-2 will-show">
                    <label for="grade">Catatan</label>
                    <textarea name="catatan" id="catatan" class="form-control catatan" {{!Auth::guard('weboperator')->user() ? 'disabled' : (Auth::guard('weboperator')->user()->role != 'Petugas' ? 'disabled' : '')}}>{{$prainterview->catatan}}</textarea>
                    <div class="invalid-feedback error-catatan"></div>
                </div>
                <div class="form-group will-show">
                    <label for="hasil">Hasil</label>
                    <select name="hasil" id="hasil" class="form-select hasil" {{!Auth::guard('weboperator')->user() ? 'disabled' : (Auth::guard('weboperator')->user()->role != 'Petugas' ? 'disabled' : '')}}>
                        <option value="lulus" {{$prainterview->hasil == 'lulus' ? 'selected' : ''}}>Lulus</option>
                        <option value="tidak lulus" {{$prainterview->hasil == 'tidak lulus' ? 'selected' : ''}}>Tidak Lulus</option>
                    </select>
                    <div class="invalid-feedback error-hasil"></div>
                </div>
            </div>
            @if (Auth::guard('weboperator')->user())
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
            @endif
        </div>
    </form>
</div>

<script>
    $(document).ready(function () {
        $('.select-dropdown').select2();
    });
</script>
