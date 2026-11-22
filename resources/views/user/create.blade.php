@extends('template.layout')

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

                <h3 class="font-weight-bold mb-3 text-gradient">Add User</h3>

                <form action="{{ route('user.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                    <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm">Cancel</a>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
