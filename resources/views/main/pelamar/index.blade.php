@extends('templates.master')

@section('title', 'Pelamar')

@section('content')
    <div class="row render">
        {{-- data render --}}
    </div>
@endsection

@push('script')
    <script src="{{asset('assets/function/peserta/main.js')}}"></script>
@endpush