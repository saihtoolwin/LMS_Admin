@extends('layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <form action="{{ route('mediacategories.update', $mediaCategory->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <a href="{{ route('mediacategories.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fa-solid fa-arrow-left-long"></i>
                </a>

                <div class="col-md-6 offset-md-3">
                    <label for="name">Fill Your Name</label>
                    <input type="text" class="form-control my-3" name="name" id="name"
                        value="{{ $mediaCategory->name }}">
                    <div class="float-right">
                        <button type="submit" class="btn btn-sm btn-info">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
@endsection
