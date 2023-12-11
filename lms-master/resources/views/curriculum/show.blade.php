@extends('layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="my-3">
                <a href="{{ route('curriculum.index') }}" class="btn btn-sm btn-primary">
                    Back
                </a>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="col-4">
                        <img src="data:img/curriculum/jpg;base64,{{ base64_encode($curriculum->image) }}" alt="" width="100%" height="300px">
                    </div>
                    <div class="col-4 ml-3 mt-3">
                        <div class="row">
                            <h3>{{$curriculum->title}}</h3>
                        </div>
                        <div class="row mt-2">
                            <p>{{$curriculum->description}}</p>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
@endsection