@extends('templates.master')

@section('title', 'Hasil Final Interview')

@section('content')
    <div class="row render">
        {{-- data render --}}
    </div>
@endsection

@push('script')
    <script src="{{asset('assets/function/finalinterview/main.js')}}"></script>
@endpush