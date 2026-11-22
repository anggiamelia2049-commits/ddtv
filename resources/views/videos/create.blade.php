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
                    <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <h3 class="font-weight-bold mb-1 text-gradient">Add Video</h3>
                        </div>

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
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control">
                            @if ($errors->has('title'))
                                <span class="text-danger">
                                    {{ $errors->first('title') }}
                                </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Video File</label>
                            <div class="custom-file">
                                <input type="file" name="video_file" class="custom-file-input" id="video_file"
                                    accept="video/*">
                                <label class="custom-file-label" for="video_file">Choose video file</label>
                            </div>
                            @error('video_file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label><br>
                            <input type="radio" name="status" value="active" required>
                            <label>active</label>
                            <input type="radio" name="status" value="inactive">
                            <label>inactive</label>
                            @if ($errors->has('status'))
                                <span class="text-danger"> {{ $errors->first('status') }}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-success btn-sm">Save</button>
                        <a href="{{ route('videos.index') }}" class="btn btn-secondary btn-sm">Cancel</a>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
