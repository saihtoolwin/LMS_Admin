@extends('layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <p class=" m-0 g-0 p-0">{{ session('success') }}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="my-3">
                <a href="{{ route('posts.create') }}" class="btn btn-sm btn-success">Create Post <i
                        class="fa-solid fa-plus mt-1"></i></a>
            </div>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Media Category</th>
                            <th>Description</th>
                            <th>Featured Image</th>
                            <th>Images</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($posts->isEmpty())
                            <tr>
                                <td colspan="8">No More Post Data ...</td>
                            </tr>
                        @else
                            @foreach ($posts as $key => $post)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $post->title }}</td>

                                    <td>{{ $post->mediaCategory->name }}</td>

                                    <td>
                                        {{ Str::substr($post->description, 0, 40) }}
                                        <span class="text-info" style="cursor: pointer">&nbsp;more..</span>
                                    </td>
                                    <td>
                                        <img src="data:image/jpeg;base64,{{ $post->featured_image }}"
                                            alt="{{ $post->title }}" style="width: 80px; height:50px">

                                    </td>
                                    <td>
                                        @foreach ($post->postImages as $image)
                                            <img src="data:image/jpeg;base64,{{ $image->image }}" alt="Image"
                                                style="width: 80px; height:50px">
                                        @endforeach
                                    </td>
                                    <td>{{ $post->status }}</td>
                                    <td>
                                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-info">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>

                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        {{-- {{ $posts->links() }} --}}
    </div>
@endsection
@section('scripts')
    @parent
@endsection
