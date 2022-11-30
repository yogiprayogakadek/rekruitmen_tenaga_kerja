@extends('templates.master')

@section('title', 'Dashboard')

@section('content')
<div class="card">
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