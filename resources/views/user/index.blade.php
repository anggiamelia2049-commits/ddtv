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
    </style>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">

                    <div class="mb-4">
                        <h2 class="font-weight-bold mb-1 text-gradient">User Page</h2>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <table class="table table-striped table-hover" id="datatable-user">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th class="text-center">
                                    <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">+ Add</a>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($user as $index => $user)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">
                                        <div class="action-buttons">
                                            <a href="{{ route('user.edit', $user->id) }}"
                                                class="btn btn-info btn-sm">
                                                Edit
                                            </a>

                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
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
            $('#datatable-user').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
