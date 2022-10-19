@extends('templates.master')

@section('title', 'Jadwal')

@section('content')
    <div class="row render">
        {{-- data render --}}
    </div>
@endsection

@push('script')
    <script src="{{asset('assets/function/jadwal/main.js')}}"></script>
@endpush