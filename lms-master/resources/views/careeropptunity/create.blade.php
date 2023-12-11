@extends('layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="my-3">
                <h2>Create Career Opptunity</h2>
            </div>
            <div>
                <form action="{{ route('careeropptunity.store') }}" method="POST">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-5  mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @if ($errors->has('title')) is-invalid @endif"
                                name="title" id="title" value="{{ old('title') }}">
                        </div>
                        <div class="col-5  mb-3">
                            <label for="Deadline">Deadline</label>
                            <input type="date" class="form-control @if ($errors->has('Deadline')) is-invalid @endif"
                                name="Deadline" id="Deadline" value="{{ old('Deadline') }}">
                        </div>
                        <div class="col-10  mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control @if ($errors->has('description')) is-invalid @endif" placeholder="description here"
                                name="description" id="description" rows="5">{{ old('description') }}</textarea>
                        </div>
                        <div class="col-10  mb-3 text-right">
                            <a href="{{ route('careeropptunity.index') }}" type="submit" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-success">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
@endsection
