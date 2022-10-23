@extends('templates.master')

@section('title', 'Petugas')

@section('content')
    <div class="row render">
        {{-- data render --}}
    </div>
@endsection

@push('script')
    <script src="{{asset('assets/function/petugas/main.js')}}"></script>
@endpush