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
        <div class="col-md-12 mb-3">
            <div class="table-responsive">
                <div class="card-body">
                    <div class="mb-2">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        Id
                                    </th>
                                    <td>
                                        {{ $adminclass->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                    <td>
                                        {{ $adminclass->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Start Date
                                    </th>
                                    <td>
                                        {{ $adminclass->startdate }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        End Date
                                    </th>
                                    <td>
                                        {{ $adminclass->enddate }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Duration
                                    </th>
                                    <td>
                                        {{ $adminclass->duration }}
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                        <a style="margin-top:20px;" class="btn btn-primary" href="{{ url()->previous() }}">
                            Back
                        </a>
                    </div>
            
                    <nav class="mb-3">
                        <div class="nav nav-tabs">
            
                        </div>
                    </nav>
                    <div class="tab-content">
            
                    </div>
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
