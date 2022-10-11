@extends('templates.master')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-sm-6 col-xl-3">
            {{Auth::guard('weboperator')->user() ?? Auth::user()}}
            <!-- Simple card -->
            <div class="card">
                <img class="card-img-top img-fluid" src="{{asset('assets/images/small/img-1.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title mb-2">Web Developer</h4>
                    <p class="card-text">At missed advice my it no sister. Miss told ham dull knew see she spot near can. Spirit her entire her called.</p>
                    <div class="text-end">
                        <a href="javascript:void(0);" class="btn btn-primary">Submit</a>
                    </div>
                </div>
            </div><!-- end card -->
        </div>
    </div>
@endsection