@extends('template/layout')
@section('content')
    <style>
        .text-gradient {
            background: linear-gradient(to left, #2386d1, #1de7e4);
            color: transparent;
            background-clip: text;
            -webkit-background-clip: text;
            display: inline-block;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('category.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="mb-4">
                            <h3 class="font-weight-bold mb-1 text-gradient">Add Category</h3>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name </label><br>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi </label><br>
                            <textarea class="form-control" name="description" value="{{ old('description') }}"></textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm">Save</button>
                            <a href="{{ route('category.index') }}" class="btn btn-secondary btn-sm">Cancel</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
