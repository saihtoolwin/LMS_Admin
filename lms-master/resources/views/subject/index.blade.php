@extends('layout.master')
@section('content')

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
                <div class="col-sm-4 col-12">
                </div>
                <div class="col-sm-8 col-12 text-right add-btn-col">
                    <a href="{{route('subject.create')}}" class="btn btn-primary float-right btn-rounded"><i class="fas fa-plus"></i> Add Subject</a>
                    
                </div>
            </div>

    <div class="content-page">
        <div class="row filter-row">
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <input type="text" class="form-control floating">
                    <label class="focus-label">Subject</label>
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
                            <th>Code</th>
                            <th>Name</th>
                            <th>Units</th>
                            <th>Semester</th>
                            <th>Year</th>
                            <th>Academic Year</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)
                        <tr>
                            <td>
                                {{$subject->id}}
                            </td>
                            <td>
                                {{$subject->code}}
                            </td>
                            <td>
                                {{$subject->name}}
                            </td>
                            <td>
                                {{$subject->units}}
                            </td>
                            <td>
                                {{$subject->semester}}
                            </td>
                            <td>
                                @foreach ($years as $item)
                                       @if ($subject->year_id == $item->id)
                                           {{$item->name}}
                                           @break
                                       @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($academics as $item)
                                       @if ($subject->academicyear_id == $item->id)
                                           {{$item->name}}
                                           @break
                                       @endif
                                @endforeach
                            </td>
                            <td class="text-right d-flex justify-content-end">
                                <a href="{{ route("subject.edit",$subject->id ) }}" class="btn btn-primary btn-sm mb-1 mr-2">
                                    <i class="far fa-edit"></i>
                                </a>

                                <a href="{{ route("subject.show",$subject->id ) }}" class="btn btn-primary btn-sm mb-1 mr-2">
                                    <i class="far fa-clone"></i>
                                </a>

                                <form action="{{ route('subject.destroy', $subject->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this class?')">
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
