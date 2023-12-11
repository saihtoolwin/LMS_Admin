@extends('layout.master')
@section('content')
    <style>
        .showpostimg {
            height: 70%;
        }
    </style>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div>
                <a href="{{ route('posts.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fa-solid fa-arrow-left-long"></i>
                </a>
            </div>
            <div class="row mt-4">
                <div class="col-2">
                    <p>Post Id</p>
                    <p>Title</p>
                    <p>Media Category</p>
                    <p>Status</p>
                    <p>Descrition</p>
                </div>
                <div class="col-10">
                    <p>:<span>&nbsp;&nbsp;</span>{{ $post->id }}</p>
                    <p>:<span>&nbsp;&nbsp;</span>{{ $post->title }}</p>
                    <p>:<span>&nbsp;&nbsp;</span>{{ $post->MediaCategory->name }}</p>
                    <p>:<span>&nbsp;&nbsp;</span>{{ $post->status }}</p>
                    <p>:<span>&nbsp;&nbsp;</span>{{ $post->description }}</p>

                </div>
                <div class="col-12 text-center">
                    <h3>Feature Image</h3>
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            <img src="data:image/jpeg;base64,{{ $post->featured_image }}" alt="{{ $post->title }}"
                                class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <h3 class="text-center">Images</h3>

                    <div class="row">
                        @foreach ($post->postImages as $image)
                            <div class="col-md-6 mb-3  align-items-center d-flex justify-content-center">
                                <img src="data:image/jpeg;base64,{{ $image->image }}" alt="Image" class="img-fluid"
                                    style="height:200px">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
@endsection
