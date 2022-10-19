@extends('templates.master')

@section('title', 'Hasil Pra Interview')

@section('content')
    <div class="row render">
        {{-- data render --}}
    </div>
@endsection

@push('script')
    <script src="{{asset('assets/function/prainterview/main.js')}}"></script>
@endpush