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
                <form action="{{ route('runningtext.update', $dataeditrunningtext->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="mb-4">
                            <h3 class="font-weight-bold mb-1 text-gradient">Edit RunningText</h3>
                        </div>
                        <label for="name" class="form-label">Category </label><br>
                        <select name="category_id" class="form-control">
                            @if ($errors->has('category'))
                                <span class="text-danger">{{ $errors->first('category') }}</span>
                            @endif
                            <option value="" class="form-label">-- Choose Category --</option><br>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" class="form-control"
                                    {{ old('category_id', $dataeditrunningtext->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        </br>
                        <div class="mb-3">
                            <label class="form-label">Text Content</label></br>
                            <input type="text" name="text_content" class="form-control"
                                value="{{ old('text_content', $dataeditrunningtext->text_content) }}">
                        </div>
                        </br>
                        @if (!empty($dataeditrunningtext->image))
                            <p class="mt-2"><img src="{{ asset('storage/' . $dataeditrunningtext->image) }}"
                                    width="100"></p>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label d-block">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="active"
                                    {{ old('status', $dataeditrunningtext->status) == 'active' ? 'checked' : '' }} required>
                                <label class="form-check-label">active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="inactive"
                                    {{ old('status', $dataeditrunningtext->status) == 'inactive' ? 'checked' : '' }}>
                                <label class="form-check-label">inactive</label>
                            </div>
                            @if ($errors->has('status'))
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            @endif
                        </div>
                    </div>
                    </br>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                        <a href="{{ route('runningtext.index') }}" class="btn btn-secondary btn-sm">Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
