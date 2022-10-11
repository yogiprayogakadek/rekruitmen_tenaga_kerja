@extends('templates.master')

@section('title', 'Lowongan')

@section('content')
    <div class="row render">
        {{-- data render --}}
    </div>
@endsection

@push('script')
    <script src="{{asset('assets/function/lowongan/main.js')}}"></script>
@endpush