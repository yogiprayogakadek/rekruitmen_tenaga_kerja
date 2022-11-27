@extends('auth.master')
@section('title', 'Rekruitmen Tenaga Kerja | Login')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-8">
        <div class="card mt-4">

            <div class="card-body p-4">
                <div class="text-center mt-2">
                    <h5 class="text-primary">Sign Up</h5>
                    <p class="text-muted">Rekruitmen Tenaga Kerja</p>
                </div>
                <div class="p-2 mt-4">
                    <form id="formRegister" action="{{route('registration.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="masukkan nama">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tempat-lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir"
                                        id="tempat-lahir" placeholder="masukkan tempat lahir">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tanggal-lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir"
                                        id="tanggal-lahir">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="jenis-kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis-kelamin" class="form-control">
                                        <option value="">Pilih jenis kelamin</option>
                                        <option value="1">Laki - Laki</option>
                                        <option value="0">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="telepon">Telepon</label>
                                    <input type="text" class="form-control" name="telepon" id="telepon" placeholder="masukkan no. telepon">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="agama">Agama</label>
                                    <input type="text" class="form-control" name="agama" id="agama" placeholder="masukkan agama">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" rows="6" placeholder="masukkan alamat"></textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="berat-badan">Berat Badan</label>
                                    <input type="text" name="berat_badan" id="berat-badan" class="form-control" placeholder="masukkan berat badan">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="tinggi-badan">Tinggi Badan</label>
                                    <input type="text" name="tinggi_badan" id="tinggi-badan" class="form-control" placeholder="masukkan tinggi badan">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="marital-status">Marital Status</label>
                                    <input type="text" name="marital_status" id="marital-status" class="form-control" placeholder="masukkan marital status">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="masukkan email">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="masukkan username">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="masukkan password">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="konfimasi-password">Konfirmasi Password</label>
                                    <input type="password" class="form-control" name="konfirmasi_password" id="konfimasi-password" placeholder="masukkan konfirmasi password">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control" name="foto" id="foto">
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button class="btn btn-success w-100" type="submit">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->

        <div class="mt-4 text-center">
            <p class="mb-0">Sudah punya akun ? <a href="/login" class="fw-semibold text-primary text-decoration-underline"> Sign In </a> </p>
        </div>

    </div>
</div>
@endsection

@push('script')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\RegistrationRequest', '#formRegister'); !!}
<script>
    $(document).ready(function () {
        @if (session('status') == 'success')
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.success("{{ session('message') }}");
        @elseif (session('status') == 'error')
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.error("{{ session('message') }}");
        @endif
    });
</script>
@endpush
