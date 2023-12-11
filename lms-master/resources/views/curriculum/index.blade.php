
@extends('layout.master')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
            <a class="btn btn-info my-2" href="{{route('curriculum.create')}}" >Create</a>
            {{-- <select name="" id="" class="form-control my-3 col-3">
                @foreach ($years as $year)
                    <option value="{{$year->id}}">
                        @if ($year->id==1)
                        First Year
                    @else
                        Second Year
                    @endif</option>
                @endforeach
            </select> --}}
        <table class="table table-border">

            <thead>
                <tr>
                    <th>
                        No
                    </th>
                    <th>
                        Year
                    </th>
                    <th>
                        Description
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
                <tr <?php foreach ($curriculums as $key => $curriculum) { ?> >
                    <td>{{$key+1}}</td>
                    <td>
                        @if ($curriculum->year_id==1)
                            first year
                          
                        @else
                          Second year
                        @endif
                    </td>
                    <td>{{$curriculum->title}}</td>
                    <td>{{$curriculum->description}}</td>
                    {{-- <td><img src="{{asset('img/curriculum/'.$curriculum->image)}}" alt="" width="100%" height="70px"></td> --}}
                    <td class="d-flex flex-warp ">
                        <a class="btn btn-info  mx-2"  href="{{route('curriculum.show',$curriculum->id)}}">View</a>
                        <a class="btn btn-warning  mx-2"  href="{{route('curriculum.edit',$curriculum->id)}}">Edit</a>
                        
                        <form action="{{route('curriculum.destroy',$curriculum->id)}}" method="post">
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
