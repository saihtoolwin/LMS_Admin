@extends('layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="my-3">
                <a href="{{ route('careeropptunity.index') }}" class="btn btn-sm btn-primary">
                    <i class="fa-solid fa-arrow-left-long"></i>
                </a>
            </div>
            <div class="row">
                <div class="col-2">
                    <p>Name</p>
                    <p>Deadline</p>
                    <p>Description</p>
                </div>
                <div class="col-10">
                    <p>{{ $showCareer->title }}</p>
                    <p>{{ \Carbon\Carbon::parse($showCareer->Deadline)->format('Y-M-d') }}</p>
                    <p>{{ $showCareer->description }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
@endsection
