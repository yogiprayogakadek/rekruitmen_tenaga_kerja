<div class="col-12">
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    Data Biodata Pelamar
                </div>
                <div class="col-6 d-flex align-items-center">
                    <div class="m-auto"></div>
                    <button type="button" class="btn btn-outline-primary btn-data">
                        <i class="nav-icon i-Pen-2 font-weight-bold"></i> Data
                    </button>
                </div>
            </div>
        </div>
        <form id="formEdit">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <input type="hidden" name="pelamar_id" id="pelamar_id" value="{{$pelamar->id}}">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control nama" name="nama" id="nama" placeholder="masukkan nama" value="{{$pelamar->nama}}" disabled>
                    <div class="invalid-feedback error-nama"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="tempat-lahir">Tempat Lahir</label>
                    <input type="text" class="form-control tempat_lahir" name="tempat_lahir" id="tempat-lahir" placeholder="masukkan tempat lahir" value="{{$pelamar->tempat_lahir}}" disabled>
                    <div class="invalid-feedback error-tempat_lahir"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="tanggal-lahir">Tanggal Lahir</label>
                    <input class="form-control tanggal_lahir" name="tanggal_lahir" id="tanggal-lahir" placeholder="masukkan tanggal lahir" value="{{date_format(date_create($pelamar->tanggal_lahir),"d-m-Y")}}" disabled>
                    <div class="invalid-feedback error-tanggal_lahir"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="jenis-kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis-kelamin" class="form-control jenis_kelamin" disabled>
                        <option value="">Pilih jenis kelamin...</option>
                        <option value="1" {{$pelamar->jenis_kelamin == 1 ? 'selected' : ''}}>Laki - Laki</option>
                        <option value="0" {{$pelamar->jenis_kelamin == 0 ? 'selected' : ''}}>Perempuan</option>
                    </select>
                    <div class="invalid-feedback error-jenis_kelamin"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="telepon">No. Telepon</label>
                    <input type="text" class="form-control telepon" name="telepon" id="telepon" placeholder="masukkan telepon" value="{{$pelamar->telepon}}" {{Auth::guard('weboperator')->user()->role != 'Petugas' ? 'disabled' : ''}}>
                    <div class="invalid-feedback error-telepon"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="agama">Agama</label>
                    <input type="text" class="form-control agama" name="agama" id="agama" placeholder="masukkan agama" value="{{$pelamar->agama}}" disabled>
                    <div class="invalid-feedback error-agama"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control alamat" rows="6" disabled>{{$pelamar->alamat}}</textarea>
                    <div class="invalid-feedback error-alamat"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="berat_badan">Berat Badan</label>
                    <input type="text" class="form-control berat_badan" name="berat_badan" id="berat_badan" placeholder="masukkan berat_badan" value="{{$pelamar->berat_badan}}" disabled>
                    <div class="invalid-feedback error-berat_badan"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="tinggi_badan">Tinggi Badan</label>
                    <input type="text" class="form-control tinggi_badan" name="tinggi_badan" id="tinggi_badan" placeholder="masukkan tinggi_badan" value="{{$pelamar->tinggi_badan}}" disabled>
                    <div class="invalid-feedback error-tinggi_badan"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="marital_status">Marital Status</label>
                    <input type="text" class="form-control marital_status" name="marital_status" id="marital_status" placeholder="masukkan marital_status" value="{{$pelamar->marital_status}}" disabled>
                    <div class="invalid-feedback error-marital_status"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control email" name="email" id="email" placeholder="masukkan email" value="{{$pelamar->email}}" {{Auth::guard('weboperator')->user()->role != 'Petugas' ? 'disabled' : ''}}>
                    <div class="invalid-feedback error-email"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="user">Username</label>
                    <input type="text" class="form-control username" name="username" id="username" placeholder="masukkan username" value="{{$pelamar->username}}" disabled>
                    <div class="invalid-feedback error-username"></div>
                </div>
                <div class="form-group mt-3">
                    <label for="foto">Foto</label>
                    <img class="d-block" src="{{$pelamar->foto}}" width="120px">
                    <div class="invalid-feedback error-foto"></div>
                </div>
                <div class="form-group mt-3">
                    <label><h5><strong>Dokumen</strong></h5></label>
                    <table class="table">
                        <tr>
                            <th>CV</th>
                            <th>Sertifikat Pengalaman Kerja</th>
                            <th>Ijazah terakhir</th>
                            <th>KTP</th>
                            <th>Passport</th>
                            <th>SAT</th>
                            <th>Crowd</th>
                            <th>Crisis</th>
                            <th>BST</th>
                            <th>Seamenbook</th>
                        </tr>
                        <tr class="render">
                            @foreach (json_decode($pelamar->documents, true) as $key => $value)
                                <td>
                                    {!! $value == 'empty' ? '<span>Belum ada unggahan</span>' : '<a href="'.asset($value).'" target="_blank"><span class="badge bg-info">View</span></a>' !!}
                                </td>
                            @endforeach
                        </tr>
                    </table>
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
        </form>
    </div>
</div>
