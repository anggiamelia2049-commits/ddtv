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

        /* Button responsive */
        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        @media (min-width: 768px) {
            .action-buttons {
                flex-direction: row;
                justify-content: center;
            }
        }

        .action-buttons .btn,
        .action-buttons form {
            width: 100%;
        }

        @media (min-width: 768px) {
            .action-buttons .btn,
            .action-buttons form {
                width: auto;
            }
        }

        .action-buttons form button {
            width: 100%;
        }

        .dzikir-cell {
            max-width: 200px;
            white-space: normal;
            word-break: break-word;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <div class="mb-4">
                        <h2 class="font-weight-bold mb-1 text-gradient">PrayerSchedules Page</h2>
                    </div>

                    <table class="table table-striped table-hover" id="datatable-prayerschedules">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Subuh</th>
                                <th>Dhuha</th>
                                <th>Dzuhur</th>
                                <th>Ashar</th>
                                <th>Maghrib</th>
                                <th>Isya</th>
                                <th>Dzikir & Tadarus</th>
                                <th>Status</th>
                                <th class="text-center">
                                    <a href="{{ route('prayerschedules.create') }}"
                                        class="btn btn-primary btn-sm">
                                        + Add
                                    </a>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($prayerschedules as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->date)->format('Y-m-d') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->subuh)->format('H:i') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->dhuha)->format('H:i') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->dzuhur)->format('H:i') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->ashar)->format('H:i') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->maghrib)->format('H:i') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->isya)->format('H:i') }}</td>
                                    <td class="dzikir-cell">{{ $item->dzikirtadarus }}</td>
                                    <td>
                                        <span class="badge bg-{{ $item->status == 'active' ? 'success' : 'warning' }}">
                                            {{ ucfirst($item->status) }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="action-buttons">
                                            <a href="{{ route('prayerschedules.edit', $item->id) }}"
                                                class="btn btn-info btn-sm">
                                                Edit
                                            </a>

                                            <form action="{{ route('prayerschedules.destroy', $item->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure?')"
                                                    class="btn btn-danger btn-sm">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#datatable-prayerschedules').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
