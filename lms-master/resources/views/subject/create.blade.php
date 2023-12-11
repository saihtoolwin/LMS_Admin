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
           <form action="{{route('subject.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="" class="form-label">Code</label><br>
                <input type="text" name="code" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Name</label><br>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Units</label><br>
                <input type="text" name="units" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Semester</label><br>
                <input type="text" name="semester" class="form-control">
            </div>
            <div class="form-group">
                <label for="" class="form-label">Year</label><br>
                <select name="year_id" id="" class="form-control">
                    <option value=""@disabled(true)>Please select Year</option>
                    @foreach ($years as $year)
                        <option value="{{$year->id}}">{{$year->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="" class="form-label">Academic Year</label><br>
                <select name="academicyear_id" id="" class="form-control">
                    <option value=""@disabled(true)>Please select Year</option>
                    @foreach ($academics as $academic)
                        <option value="{{$academic->id}}">{{$academic->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-2">
                <button class="btn btn-primary" name="submit">Add</button>
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
