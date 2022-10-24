@extends('templates.master')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        @if (!Auth::guard('weboperator')->user())
            @forelse ($lowongan as $key => $lowongan)
                <div class="col-sm-6 col-xl-3">
                    {{-- {{Auth::guard('weboperator')->user() ?? Auth::user()}} --}}
                    <!-- Simple card -->
                    <div class="card">
                        <img class="card-img-top img-fluid" src="{{asset($lowongan->foto)}}">
                        <div class="card-body">
                            <h4 class="card-title mb-2">{{$lowongan->nama}}</h4>
                            {{-- <p class="card-text">At missed advice my it no sister. Miss told ham dull knew see she spot near can. Spirit her entire her called.</p> --}}
                            <div class="text-end">
                                <a href="javascript:void(0);" class="btn btn-primary btn-lowongan" data-id="{{$lowongan->id}}">Lihat</a>
                            </div>
                        </div>
                    </div><!-- end card -->
                </div>
            @empty
                <h4>Data Kosong</h4>
            @endforelse
        @else
            @foreach (model() as $key => $value)
            <div class="col-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <p class="fw-medium text-muted mb-0">{{$value}}</p>
                                <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="{{total_data_model($value)}}">{{total_data_model($value)}}</span></h2>
                                <p class="mb-0 text-muted">
                                    <a href="{{route(route_to_model()[$key])}}">
                                        <span class="badge bg-light text-success mb-0">
                                            <i class="ri-arrow-right-line align-middle"></i>
                                        </span> Lihat lebih lengkap
                                    </a>
                                </p>
                            </div>
                            <div>
                                <div class="avatar-sm flex-shrink-0">
                                    <span class="avatar-title bg-soft-info rounded-circle fs-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users text-info"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div>
            </div>
            @endforeach
        @endif
    </div>

    {{-- modal upload --}}
    <div class="live-preview">
        <div>
            <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Lowongan Kerja</h5>
                        </div>
                        <form id="formLowongan">
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" name="lowongan_id" id="lowongan-id">
                                <div class="form-group foto-lowongan"></div>
                                <div class="form-group">
                                    <label for="nama">Nama Lowongan</label>
                                    <input type="text" name="nama" id="nama" disabled class="form-control">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="deskripsi">Deskripsi</label>
                                    <div class="deskripsi"></div>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="posisi">Posisi</label>
                                    <select name="posisi" id="posisi" class="form-control"></select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary btn-save">Lamar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('body').on('click', '.btn-lowongan', function() {
                $('#posisi').empty();
                let lowongan_id = $(this).data('id');
                $('#modalDetail').modal('show')
                $.get("/detail-lowongan/"+lowongan_id, function (data) {
                    $('input[name=nama]').val(data.nama);
                    $('input[name=lowongan_id]').val(data.id);
                    $('.deskripsi').html('<span>' + data.deskripsi + '</span>');

                    $.each(data.posisi.split(', '), function (index, value) { 
                        $('#posisi').append('<option value='+value+'>'+value+'</option>')
                    });
                });
            });

            $('body').on('click', '.btn-save', function (e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                let form = $('#formLowongan')[0]
                let data = new FormData(form)
                $.ajax({
                    type: "POST",
                    url: "/proses-lamaran",
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend: function () {
                        $('.btn-save').attr('disable', 'disabled')
                        $('.btn-save').html('<i class="fa fa-spin fa-spinner"></i>')
                    },
                    complete: function () {
                        $('.btn-save').removeAttr('disable')
                        $('.btn-save').html('Save')
                    },
                    success: function (response) {
                        $('#modalDetail').modal('hide')
                        Swal.fire(
                            response.title,
                            response.message,
                            response.status
                        );

                        if(response.status != 'info') {
                            setTimeout(() => {
                                location.reload()
                            }, 1000);
                        }

                    },
                    error: function (error) {
                        // 
                    }
                });
            });
        });
    </script>
@endpush