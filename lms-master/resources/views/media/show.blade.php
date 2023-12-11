@extends('layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="my-3">
                <a href="{{ route('mediacategories.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fa-solid fa-arrow-left-long"></i>
                </a>
            </div>

            {{-- Media Categoy --}}
            <h2 class="text-center mb-4">{{ $posts->name }}</h2>

            @if ($posts->posts->isEmpty())
                <p class="text-danger">No Posts in this media.</p>
            @else
                @foreach ($posts->posts as $post)
                    <div class="accordion" id="accordionExample{{ $post->id }}">
                        <div class="card p-3">
                            <div class="card-header p-0 g-0 border-0" id="heading{{ $post->id }}">
                                <!-- ... Rest of your code ... -->
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <img src="data:image/jpeg;base64,{{ $post->featured_image }}"
                                            alt="{{ $post->title }}" class="img-fluid" style="height: 150px">
                                    </div>

                                    <div class="col-md-8">
                                        <div class="post ">
                                            <h4 class="m-0 mb-2">{{ $post->title }}</h4>
                                            <p class="m-0 mb-2"> {{ $posts->name }}</p>
                                            <p class="m-0 mb-2">Status : {{ $post->status }}</p>
                                            <button class="btn btn-link btn-block text-left collapsed  mb-2" type="button"
                                                data-toggle="collapse" data-target="#collapse{{ $post->id }}"
                                                aria-expanded="false" aria-controls="collapse{{ $post->id }}">
                                                View More...
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div id="collapse{{ $post->id }}" class="collapse"
                                    aria-labelledby="heading{{ $post->id }}"
                                    data-parent="#accordionExample{{ $post->id }}">
                                    <div class="card-body">
                                        <p class="m-0 mb-3">{{ $post->description }}</p>

                                        <div class="row">
                                            @foreach ($post->postImages as $image)
                                                <div
                                                    class="col-md-4 mb-3  align-items-center d-flex justify-content-center">
                                                    <img src="data:image/jpeg;base64,{{ $image->image }}" alt="Image"
                                                        class="img-fluid" style="height:200px">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        @endsection
        @section('scripts')
            @parent
        @endsection
