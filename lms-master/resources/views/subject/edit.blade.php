@extends('layout.master')
@section('content')

<div>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Subject</h5>
                </div>
            </div>
        </div>
    
    <div class="row">
        <div class="col-md-12 mb-3">
           <form action="{{route('subject.update',$subject->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="" class="form-label">Code</label><br>
                <input type="text" name="code" class="form-control" value="{{ old('name', isset($subject) ? $subject->code : '') }}">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Name</label><br>
                <input type="text" name="name" class="form-control" value="{{ old('name', isset($subject) ? $subject->name : '') }}">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Units</label><br>
                <input type="text" name="units" class="form-control" value="{{ old('name', isset($subject) ? $subject->units : '') }}">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Semester</label><br>
                <input type="text" name="semester" class="form-control" value="{{ old('name', isset($subject) ? $subject->semester : '') }}">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Year</label><br>
                <select name="year_id" id="" class="form-control">
                    @foreach ($years as $year)
                      @if ($year->id==$subject->year_id)
                        <option value="{{$year->id}}" selected>{{$year->name}}</option>
                      @else
                         <option value="{{$year->id}}">{{$year->name}}</option>
                      @endif
                    @endforeach
                 </select>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Academic Year</label><br>
                <select name="academicyear_id" id="" class="form-control">
                    @foreach ($academics as $academic)
                      @if ($academic->id==$subject->academicyear_id)
                        <option value="{{$academic->id}}" selected>{{$academic->name}}</option>
                      @else
                         <option value="{{$academic->id}}">{{$academic->name}}</option>
                      @endif
                    @endforeach
                 </select>
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
