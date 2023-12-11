@extends('layout.master')
@section('content')

<div>
    
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Academic Year</h5>
                </div>
            </div>
        </div>
    
    <div class="row">
        <div class="col-md-12 mb-3">
           <form action="{{route('alert.update',$alert->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="" class="form-label">Title</label><br>
                <textarea type="text" name="title" class="form-control" value="{{ old('title', isset($alert) ? $alert->title : '') }}">{{$alert->title}}</textarea>
                @if ($errors->has('title'))
                    <span class="text-danger">Please enter title</span>                    
                @endif
            </div>
            <div class="mt-2">
                <button class="btn btn-primary" name="update">Update</button>
                <a class="btn btn-warning" name="update" href="{{route('alert.index')}}">Cancel</a>
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