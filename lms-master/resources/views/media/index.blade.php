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
            <div>
                <h2>Media Category List</h2>
            </div>
            <div class="my-3">
                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#createPost">
                    Create <i class="fa-solid fa-plus mt-1"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="createPost" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create Media Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('mediacategories.store') }}" method="POST">
                                    @csrf
                                    <label for="name">Fill Your Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        autocomplete="off">
                            </div>
                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancle</button>

                                <button type="submit" class="btn btn-sm btn-success">Create</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($categories->isEmpty())
                            <tr>
                                <td colspan="3">No categories found</td>
                            </tr>
                        @else
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="{{ route('mediacategories.show', $category->id) }}"
                                            class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>
                                        <a href="{{ route('mediacategories.edit', $category->id) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('mediacategories.destroy', $category->id) }}" method="POST"
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
    </div>
@endsection
@section('scripts')
    @parent
@endsection
