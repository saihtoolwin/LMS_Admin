@extends('layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <a class="btn btn-info my-2" href="{{ route('coreteam.create') }}">Create</a>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
            <div class="row ">
                <div class="col-md-12">
                    @foreach ($coreteams as $coreteam)
                        <div class="card  col-md-4   d-flex flex-warp" style="width: 18rem;">
                            <img class="card-img-top mt-2" src="data:img/curriculum/jpg;base64,{{ base64_encode($coreteam->image) }}" alt="{{ $coreteam->name }}">
                            <div class="card-body">
                                <h5 class="card-title">Name: {{ $coreteam->name }}</h5>
                                <p class="card-text" >Role : {{$coreteam->role}}</p>
                            </div>
                            <div class="row ml-3 mb-3">
                                <a  class="btn btn-warning mr-2" href="{{route('coreteam.edit',$coreteam->id)}}">Edit</a>
                                <form action="{{route('coreteam.destroy',$coreteam->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- {{asset('img/teacher/test.jpg')}}
{{asset('img/sidebar/icon-21.png')}} --}}
@endsection
@section('scripts')
    @parent
@endsection
