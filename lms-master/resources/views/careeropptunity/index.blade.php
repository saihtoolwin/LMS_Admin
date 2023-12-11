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
                <a href="{{ route('careeropptunity.create') }}" class="btn btn-primary">
                    Create <i class="fa-solid fa-plus mt-1"></i>
                </a>
            </div>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Deadline</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($carriers->isEmpty())
                            <tr>
                                <td>No Data for Carrer Opptunity</td>
                            </tr>
                        @else
                            @foreach ($carriers as $key => $carrer)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $carrer->title }}</td>
                                    <td>
                                        {{ Str::substr($carrer->description, 0, 40) }}
                                        <span class="text-info">&nbsp;more...</span>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($carrer->Deadline)->format('Y-M-d') }} </td>

                                    <td>
                                        <a href="{{ route('careeropptunity.show', $carrer->id) }}"
                                            class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>
                                        <a href="{{ route('careeropptunity.edit', $carrer->id) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form action="{{ route('careeropptunity.destroy', $carrer->id) }}" method="POST"
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
                <div class="mt-5 text-center">
                    {{ $carriers->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
@endsection
