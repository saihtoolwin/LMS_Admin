@extends('layout.master')
@section('content')

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
                <div class="col-sm-4 col-12">
                </div>
                <div class="col-sm-8 col-12 text-right add-btn-col">
                    <a href="{{route('class.create')}}" class="btn btn-primary float-right btn-rounded"><i class="fas fa-plus"></i> Add Class</a>
                    
                </div>
            </div>

    <div class="content-page">
        <div class="row filter-row">
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <input type="text" class="form-control floating">
                    <label class="focus-label">Class</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
            </div>
            <div class="col-sm-6 col-md-3">
            </div>
            <div class="col-sm-6 col-md-3">
                <a href="#" class="btn btn-search rounded btn-block"> search </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="table-responsive">
                <table class="table custom-table datatable">
                    <thead class="thead-light">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Duration</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classes as $class)
                        <tr>
                            <td>
                                {{$class->id}}
                            </td>
                            <td>
                                {{$class->name}}
                            </td>
                            <td>
                                {{$class->startdate}}
                            </td>
                            <td>
                                {{$class->enddate}}
                            </td>
                            <td>
                                {{$class->duration}}
                            </td>
                            <td class="text-right d-flex justify-content-end">
                                <a href="{{ route("class.edit",$class->id ) }}" class="btn btn-primary btn-sm mb-1 mr-2">
                                    <i class="far fa-edit"></i>
                                </a>

                                <a href="{{ route("class.show",$class->id ) }}" class="btn btn-primary btn-sm mb-1 mr-2">
                                    <i class="far fa-clone"></i>
                                </a>
                                
                                <form action="{{ route('class.destroy', $class->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this class?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" data-toggle="modal" data-target="#delete_employee" class="btn btn-danger btn-sm mb-1">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection
@section('scripts')
@parent
@endsection
