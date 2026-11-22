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
                <form action="{{ route('flyers.update', $dataeditflyers->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="mb-4">
                            <h3 class="font-weight-bold mb-1 text-gradient">Edit Flyer</h3>
                        </div>
                        <label for="name" class="form-label">Category </label><br>
                        <select name="category_id" class="form-control">
                            @if ($errors->has('category'))
                                <span class="text-danger">{{ $errors->first('category') }}</span>
                            @endif
                            <option value="" class="form-label">-- Choose Category --</option><br>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" class="form-control"
                                    {{ old('category_id', $dataeditflyers->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        </br>
                        <div class="mb-3">
                            <label class="form-label">Title</label></br>
                            <input type="text" name="title" class="form-control"
                                value="{{ old('title', $dataeditflyers->title) }}">
                        </div>
                        </br>
                        <div class="form-group">
                            <label for="image" class="form-label">Image</label><br>
                            <div class="custom-file">
                                <label class="custom-file-label" for="image">Choose file</label>
                                <input type="file" class="custom-file-input" id="image" name="image">
                            </div>
                            @if (!empty($dataeditflyers->image))
                                <p class="mt-2"><img src="{{ asset('storage/' . $dataeditflyers->image) }}"
                                        width="100"></p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label><br>
                            <input type="radio" name="status" value="active"
                                {{ old('status', $dataeditflyers->status) == 'active' ? 'checked' : '' }} required>
                            <label>active</label>
                            <input type="radio" name="status" value="inactive"
                                {{ old('status', $dataeditflyers->status) == 'inactive' ? 'checked' : '' }}>
                            <label>inactive</label>
                            @if ($errors->has('status'))
                                <span class="text-danger">{{ $errors->first('status') }}
                                </span>
                            @endif
                        </div>
                        </br>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm">update</button>
                            <a href="{{ route('flyers.index') }}" class="btn btn-secondary btn-sm">cancel</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
