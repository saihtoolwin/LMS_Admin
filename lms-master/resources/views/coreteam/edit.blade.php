@extends('layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="col-md-8 ">
                <form action="{{route('coreteam.update',$coreteam->id)}}" method="post"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h3 class="mt-2">Create Core Team</h3>
                    <div class="ml-3">
                        <img src="data:img/teacher/jpg;base64,{{ base64_encode($coreteam->image) }}" class="rounded" id="preview" alt="" width="250px" height="300px">
                        <input type="file" name="image" onchange="previewFile(event)">
                        
                    </div>
                    <div class="col-md-6 mb-3 ">
                        <label for="name" >Name</label>
                        <input type="text" name="name" value="{{old('name',isset($coreteam) ? $coreteam->name : '')}}" id="name" class="form-control">
                        @if ($errors->has('name'))
                            <span class="text-danger">Please Enter Name</span>
                        @endif
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="role" >Lectuere</label>
                        <input type="text" name="role" value="{{old('role',isset($coreteam) ? $coreteam->role : '')}}" id="role" class="form-control">
                        @if ($errors->has('role'))
                            <span class="text-danger">Please Enter Role</span>
                        @endif
                    </div>
                    <div class="ml-3">
                        <button type="submit" class="btn btn-primary mb-3" >Update Teacher</button>
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