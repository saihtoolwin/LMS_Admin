@extends('layout.master')
@section('content')
{{-- @php
    dd($years);
@endphp --}}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="col-md-8 ">
                <form action="{{route('curriculum.store')}}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <h3 class="mt-2">Create Curriculum</h3>
                    <div class="ml-3">
                        <img src="" class="rounded" id="preview" alt="" width="250px" height="300px">
                        <input type="file" name="image" onchange="previewFile(event)">
                    </div>
                    <label for="" class="ml-3 mt-3">Year</label>
                    <select name="year_id" id="" class="form-control col-md-3 ml-3">
                        @foreach ($years as $year)
                            <option value="{{$year->id}}">
                                @if ($year->id==1)
                                First Year
                            @else
                                Second Year
                            @endif</option>
                        @endforeach
                    </select>
                    @if ($errors->has('year_id'))
                            <span class="text-danger">Number must Only 1 and 2</span>                            
                        @endif
                    <div class="col-md-6 mb-3 mt-2">
                        <label for="name" >Title</label>
                        <input type="text" name="title" id="name" class="form-control">
                        @if ($errors->has('title'))
                            <span class="text-danger">Title is required</span>                            
                        @endif
                    </div>
                    <div class="col-md-8 mb-3 ">
                        <label  >Description</label>
                        <textarea name="description" class="form-control" id="" ></textarea>
                        @if ($errors->has('description'))
                            <span class="text-danger">Description is required</span>                            
                        @endif
                    </div>
                    <div class="ml-3">
                        <button type="submit" class="btn btn-primary mb-3" >Add Carriculum</button>
                        <a class="btn btn-warning mb-3" href="{{ url()->previous() }}">Cancel</a>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    
<script>
    function previewFile(event) {
        var preview = document.getElementById('preview');
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
</script>



@endsection
@section('scripts')
    @parent
@endsection
