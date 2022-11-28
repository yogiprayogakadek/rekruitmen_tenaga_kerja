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
                        <option value="">Semuanya</option>
                        <option value="product">Lulus</option>
                        <option value="category">Tidak Lulus</option>
                    </select>
                </div>
            </div>
            <div class="col-1">
                <button type="button" class="btn btn-primary">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="card-body render"></div>
</div>
@endsection

@push('script')
    
@endpush