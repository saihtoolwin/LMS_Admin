@extends('layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="d-flex">

                <div class="mr-4"><a href="{{ route('posts.index') }}" class="btn btn-sm btn-secondary"><i
                            class="fa-solid fa-arrow-left-long"></i></a></div>
                <h2>Create New Post</h2>
            </div>

            <form action="{{ route('posts.store') }}" method="POST" class="px-4" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="title">Name</label>
                        <input type="text" class="form-control @if ($errors->has('title')) is-invalid @endif"
                            name="title" id="title" value="{{ old('title') }}">

                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="media_category_id">Media Category</label>
                        <select name="media_category_id" id="media_category_id" class="form-control">
                            <option disabled selected> --Select Category -- </option>
                            @foreach ($mediacategories as $mediaCategory)
                                <option value="{{ $mediaCategory->id }}">
                                    {{ $mediaCategory->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="featured_image">Feature Image</label>
                        <input type="file" class="form-control" name="featured_image" id="featured_image">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="images">Images</label>
                        <input type="file" class="form-control" name="images[]" id="images" multiple>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="status">Status</label>
                        <input type="number" class="form-control @if ($errors->has('status')) is-invalid @endif"
                            name="status" id="status" value="{{ old('status') }}" min="1" max="3">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control @if ($errors->has('description')) is-invalid @endif" placeholder="description here"
                            name="description" id="description" rows="5"></textarea>
                    </div>
                    <div class="col-md-12 mb-3 text-end">
                        <button class="btn btn-primary float-right">Create</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
@endsection
