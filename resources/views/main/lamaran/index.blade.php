@extends('templates.master')

@section('title', 'Lamaran')

@section('content')
    <div class="row render"></div>
@endsection

@push('script')
    <script src="{{asset('assets/function/lamaran/main.js')}}"></script>
@endpush
