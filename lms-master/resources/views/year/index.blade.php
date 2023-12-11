@extends('layout.master')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h5 class="text-uppercase mb-0 mt-0 page-title"> Year</h5>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-sm-4 col-12">
                </div>
                <div class="col-sm-8 col-12 text-right add-btn-col">
                    {{-- <a href="add-exam.html" class="btn btn-primary float-right btn-rounded"><i class="fas fa-plus"></i> Add Exam</a> --}}
                    <a class="btn btn-success" id="btn_add" data-target="#form-modal" data-toggle='modal'>
                        Add Year
                    </a>
                    <div class="modal" id="form-modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title">Add  Year</h2>
                                    <button type class="btn-close" data-dismiss='modal'></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('year.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                       <div>
                                        <label for="" class="form-label">Name</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                       </div>
                                       <div class="mt-2">
                                        <button class="btn btn-success" name="submit">Add</button>
                                       </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <div class="content-page">
        <div class="row filter-row">
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <input type="text" class="form-control floating">
                    <label class="focus-label">Year</label>
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
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($years as $year)
                        <tr>
                            <td>
                                {{$year->id}}
                            </td>
                            <td>
                                {{$year->name}}
                            </td>
                            <td class="text-right d-flex justify-content-end">
                                <a href="{{ route("year.edit",$year->id ) }}" class="btn btn-primary btn-sm mb-1 mr-2">
                                    <i class="far fa-edit"></i>
                                </a>

                                <a href="{{ route("year.show",$year->id ) }}" class="btn btn-primary btn-sm mb-1 mr-2">
                                    <i class="far fa-clone"></i>
                                </a>
                                
                                <form action="{{ route('year.destroy', $year->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this year?')">
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
