@extends('template/layout')
@section('content')
    <style>
        .text-gradient {
            background: linear-gradient(to left, #1de7e4, #2386d1);
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
                    <form action="{{ route('user.update', $dataedituser->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <h3 class="font-weight-bold mb-1 text-gradient">Edit User</h3>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label><br>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $dataedituser->name) }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label><br>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $dataedituser->email) }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label><br>
                            <input type="password" name="password" class="form-control">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-success btn-sm">Update</button>
                            <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
