@extends('templates.master')
@section('title', 'Dashboard')

@section('content')
@if (Auth::guard('weboperator')->user()->role == 'Petugas')
<div class="col-4">
    <div class="card card-animate">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <p class="fw-medium text-muted mb-0">Pelamar belum divalidasi</p>
                    <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value" data-target="{{needValidate()}}">{{needValidate()}}</span></h2>
                    <p class="mb-0 text-muted">
                        <a href="{{route('lamaran.index')}}">
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
@endif

<div class="card mt-4">
    <div class="card-header align-items-center d-flex">
        <h4 class="card-title mb-0 flex-grow-1">Chart Pelamar</h4>
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <select class="form-control" id="bulan">
                        <option value="">Pilih Bulan</option>
                        @foreach (bulan() as $key => $bulan)
                        <option value="{{$key+1}}">{{$bulan}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <select class="form-control" id="tahun">
                        <option value="">Pilih Tahun</option>
                        @for($i = 2022; $i <= 2030; $i++) <option value="{{$i}}">{{$i}}</option>
                            @endfor
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <select class="form-control" id="filter">
                        <option value="">Filter</option>
                        <option value="kelulusan">Kelulusan</option>
                        <option value="pelamar">Pelamar</option>
                    </select>
                </div>
            </div>
            <div class="col-1">
                <button type="button" class="btn btn-primary" id="btn-search">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="card-body render"></div>
</div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(document).ready(function(){
        function renderChart(bulan, tahun, filter) {
            $('.render').empty()
            if(bulan == '' || tahun == '' || filter == ''){
                $('.render').html('<div class="text-center"><h4>Tidak ada data</h4></div>')
                Swal.fire({
                    icon: 'warning',
                    title: 'Maaf...',
                    text: 'Pilih Bulan dan Tahun atu Filter terlebih dahulu!',
                });
            }else{
                $.ajax({
                    url: "{{route('dashboard.chart')}}",
                    type: 'POST',
                    data: {
                        filter: filter,
                        bulan: bulan,
                        tahun: tahun,
                        _token: '{{csrf_token()}}'
                    },
                    success: function(data){
                        $('.render').html(data.data);
                    }
                });
            }
        }

        $('#btn-search').click(function(){
            $('.render').empty()
            var bulan = $('#bulan').val();
            var tahun = $('#tahun').val();
            var filter = $('#filter').val();
            renderChart(bulan, tahun, filter);
        });
    });
</script>
@endpush