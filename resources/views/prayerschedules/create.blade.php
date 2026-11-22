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
                <form action="{{ route('prayerschedules.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="mb-4">
                            <h3 class="font-weight-bold mb-1 text-gradient">Add PrayerSchedules</h3>
                        </div>
                        <div class="mb-3">
                            <label>Date</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Subuh</label>
                            <input type="time" name="subuh" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Dhuha</label>
                            <input type="time" name="dhuha" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Dzuhur</label>
                            <input type="time" name="dzuhur" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Ashar</label>
                            <input type="time" name="ashar" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Maghrib</label>
                            <input type="time" name="maghrib" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Isya</label>
                            <input type="time" name="isya" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Dzikir & Tadarus</label>
                            <input type="time" name="dzikirtadarus" class="form-control">
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
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="{{ route('prayerschedules.index') }}" class="btn btn-secondary">Cancel</a>

                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
