@extends('template/layout')
@section('content')
    <style>
        .text-gradient {
            background: linear-gradient(to left, #2386d1,  #4c4ac6, #1de7e4);
            color: transparent;
            background-clip: text;
            -webkit-background-clip: text;
            display: inline-block;
        }

        /* Button responsive (SAMA PERSIS) */
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

        /* Samakan dengan dzikir-cell */
        .description-cell {
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
                        <h2 class="font-weight-bold mb-1 text-gradient">Category Page</h2>
                    </div>

                    <table class="table table-striped table-hover" id="datatable-category">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th class="text-center">
                                    <a href="{{ route('category.create') }}"
                                        class="btn btn-primary btn-sm">
                                        + Add
                                    </a>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($categories as $v)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $v->name }}</td>
                                    <td class="description-cell">{{ $v->description }}</td>
                                    <td class="text-center">
                                        <div class="action-buttons">
                                            <a href="{{ route('category.edit', $v->id) }}"
                                                class="btn btn-info btn-sm">
                                                Edit
                                            </a>

                                            <form action="{{ route('category.destroy', $v->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this category?')"
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
            $('#datatable-category').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
