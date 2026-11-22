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
                <div class="card-body">
                    <div class="mb-4">
                        <h3 class="font-weight-bold mb-1 text-gradient">Add RunningText</h3>
                    </div>
                    <form action="{{ route('runningtext.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">-- Choose Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                                <span class="text-danger">
                                    {{ $errors->first('category_id') }}
                                </span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Text Content</label>
                            <input type="text" name="text_content" class="form-control">
                            @if ($errors->has('text_content'))
                                <span class="text-danger">
                                    {{ $errors->first('text_content') }}
                                </span>
                            @endif
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Status</label><br>
                            <input type="radio" name="status" value="active" required>
                            <label>active</label>
                            <input type="radio" name="status" value="inactive">
                            <label>inactive</label>
                            @if ($errors->has('status'))
                                <span class="text-danger">
                                    {{ $errors->first('status') }}
                                </span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-success btn-sm">Save</button>
                        <a href="{{ route('runningtext.index') }}" class="btn btn-secondary btn-sm">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
