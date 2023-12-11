@extends('layout.master')
@section('content')

<div>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Class</h5>
                </div>
            </div>
        </div>
    
    <div class="row">
        <div class="col-md-12 mb-3">
           <form action="{{route('class.update',$class->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="" class="form-label">Name</label><br>
                <input type="text" name="name" class="form-control" value="{{ old('name', isset($class) ? $class->name : '') }}">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Start Date</label><br>
                <input type="date" name="startdate" class="form-control" value="{{ old('name', isset($class) ? $class->startdate : '') }}">
            </div>
            <div class="form-group">
                <label for="" class="form-label">End Date</label><br>
                <input type="date" name="enddate" class="form-control" value="{{ old('name', isset($class) ? $class->enddate : '') }}">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Duration</label><br>
                <input type="text" name="duration" class="form-control" value="{{ old('name', isset($class) ? $class->duration : '') }}">
            </div>
            <div class="mt-2">
                <button class="btn btn-primary" name="update">Update</button>
            </div>
           </form>
        </div>
    </div>
    </div>
</div>
</div>

@endsection
@section('scripts')
@parent
@endsection
