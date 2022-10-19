@extends('templates.master')

@section('title', 'Lamaran')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            Data Biodata Lamaran
                        </div>
                    </div>
                </div>
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
                        <label for="tanggal-lahir">Tanggal lahir</label>
                        <input type="date" class="form-control tanggal_lahir" name="tanggal_lahir" id="tanggal-lahir" placeholder="masukkan tanggal lahir" value="{{$pelamar->tanggal_lahir}}" disabled>
                        <div class="invalid-feedback error-tanggal_lahir"></div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="jenis-kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis-kelamin" class="form-control jenis_kelamin" disabled>
                            <option value="">Pilih jenis kelamin...</option>
                            <option value="1" {{$pelamar->jenis_kelamin == 1 ? 'selected' : ''}}>Male</option>
                            <option value="0" {{$pelamar->jenis_kelamin == 0 ? 'selected' : ''}}>Female</option>
                        </select>
                        <div class="invalid-feedback error-jenis_kelamin"></div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="telepon">No. Telepon</label>
                        <input type="text" class="form-control telepon" name="telepon" id="telepon" placeholder="masukkan telepon" value="{{$pelamar->telepon}}" disabled>
                        <div class="invalid-feedback error-telepon"></div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control alamat" rows="6" disabled>{{$pelamar->alamat}}</textarea>
                        <div class="invalid-feedback error-alamat"></div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="user">Username</label>
                        <input type="text" class="form-control username" name="username" id="username" placeholder="masukkan username" value="{{$pelamar->username}}" disabled>
                        <div class="invalid-feedback error-username"></div>
                    </div>
                    <div class="form-group mt-3">
                        <label><h5><strong>Dokuments</strong></h5></label>
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
                                {{-- @foreach (json_decode($pelamar->lamaran->documents, true) as $key => $value)
                                    <td>
                                        {!! $value == 'empty' ? '<span class="badge bg-primary pointer btn-upload" data-id="'.$pelamar->id.'" data-document="'.strtoupper($key).'">Unggah</span>' : '<a href="'.asset($value).'" target="_blank"><span class="badge bg-info">View</span></a>  <span class="badge bg-secondary pointer btn-upload" data-id="'.$pelamar->id.'" data-document="'.$key.'">Ubah</span>' !!}
                                    </td>
                                @endforeach --}}
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal upload --}}
    <div class="live-preview">
        <div>
            <div class="modal fade" id="modalUpload" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button> --}}
                        </div>
                        <form id="formUpload">
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" name="document" id="document">
                                <input type="hidden" name="pelamar_id" id="pelamar-id">
                                <div class="form-group">
                                    <label for="file">Dokumen File</label>
                                    <input type="file" name="file" id="file" class="form-control file">
                                    <div class="invalid-feedback error-file"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary process-upload">Unggah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{asset('assets/function/pelamar/dokumen/main.js')}}"></script>
@endpush