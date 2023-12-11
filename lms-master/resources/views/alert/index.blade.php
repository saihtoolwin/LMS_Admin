
@extends('layout.master')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
            <a class="btn btn-info my-2"  data-target="#form-modal" data-toggle='modal'>Create</a>
            <div class="modal" id="form-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title">Title</h2>
                            <button type class="btn-close" data-dismiss='modal'></button>
                        </div>
                        <div class="modal-body">
                            <form href="{{route('alert.store')}}" method="post" >
                                @csrf
                                
                                <textarea name="title" class="form-control my-2"  cols="30" rows="10">
                                   </textarea>
                                   @if ($errors->has('title'))
                                   <span class="text-danger col-12 ">Please enter your title</span>
                                    @endif
                                    <div class="row ml-2 mt-4">
                                        <button class="btn btn-success  mr-3">Add Title</button>
                                        <button type class="btn btn-warning btn-close" data-dismiss='modal'>Cancel</button>
                                    </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <table class="table table-border">

            <thead>
                <tr>
                    <th>
                        No
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr <?php foreach ($alert as $key => $title) { ?> >
                    <td>{{$key+1}}</td>
                    <td>{{$title->title}}</td>
                    <td class="d-flex flex-warp ">

                        <a class="btn btn-warning  mx-2"  href="{{route('alert.edit',$title->id)}}">Edit</a>
                        
                        <form action="{{route('alert.destroy',$title->id)}}" method="post" onsubmit="return confirm('Are you sure you want to delete this title?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger ">Delete</button></td>
                        </form>
                        
                     
                </tr <?php } ?>>
                
            </tbody>
        </table>
    </div>
</div>

@endsection
@section('scripts')
@parent
@endsection
