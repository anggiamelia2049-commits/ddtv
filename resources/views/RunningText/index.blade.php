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

        .running-text-cell {
            max-width: 300px;
            white-space: normal;
            word-break: break-word;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <div class="mb-4">
                        <h2 class="font-weight-bold mb-1 text-gradient">RunningText Page</h2>
                    </div>

                    <table class="table table-striped table-hover" id="datatable-runningtext">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category</th>
                                <th>Text Content</th>
                                <th>Status</th>
                                <th class="text-center">
                                    <a href="{{ route('runningtext.create') }}" class="btn btn-primary btn-sm">
                                        + Add
                                    </a>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($runningtext as $v)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $v->category->name ?? '-' }}</td>
                                    <td class="running-text-cell">{{ $v->text_content }}</td>
                                    <td>
                                        <span class="badge bg-{{ $v->status == 'active' ? 'success' : 'warning' }}">
                                            {{ ucfirst($v->status) }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="action-buttons">
                                            <a href="{{ route('runningtext.edit', $v->id) }}"
                                                class="btn btn-info btn-sm">
                                                Edit
                                            </a>

                                            <form action="{{ route('runningtext.destroy', $v->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure want to delete?')"
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
            $('#datatable-runningtext').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
