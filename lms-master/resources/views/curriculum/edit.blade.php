@extends('layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="col-md-8 ">
                <form action="{{route('curriculum.update',$curriculum->id)}}" method="post"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h3 class="mt-2">Edit Curriculum</h3>
                    <div class="ml-3">
                        <img src="data:img/curriculum/jpg;base64,{{ base64_encode($curriculum->image) }}" class="rounded" id="preview" alt="" width="250px" height="300px">
                        <input type="file" name="image" onchange="previewFile(event)">

                    </div>
                    <div class="col-md-6 mb-3 ">
                        <label for="name" >Year</label>
                        <input type="number" name="year_id" value="{{old('name',isset($curriculum) ? $curriculum->year_id : '')}}" id="name" class="form-control">
                        @if ($errors->has('year_id'))
                            <span class="text-danger">Number must Only 1 and 2</span>                            
                        @endif
                    </div>
                    <div class="col-md-6 mb-3 ">
                        <label for="name" >Title</label>
                        <input type="text" name="title" value="{{old('name',isset($curriculum) ? $curriculum->title : '')}}" id="name" class="form-control">
                        @if ($errors->has('title'))
                            <span class="text-danger">Title is required</span>                            
                        @endif
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="role" >Description</label>
                        <input type="text" name="description" value="{{old('role',isset($curriculum) ? $curriculum->description : '')}}" id="role" class="form-control">
                        @if ($errors->has('description'))
                            <span class="text-danger">Description in required</span>                            
                        @endif
                    </div>
                    <div class="ml-3">
                        <button type="submit" class="btn btn-primary mb-3" >Update Curriculum</button>
                        <a class="btn btn-warning mb-3" href="{{ route('curriculum.index') }}">Cancel</a>
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