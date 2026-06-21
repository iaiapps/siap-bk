@extends('layouts.app')

@section('title', 'Data Kelas')

@section('content')

    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <a href="{{ route('classroom.create') }}" class="btn btn-primary mb-3">tambah kelas</a>

    <div class="card rounded p-3">
        <div class="table-responsive">

            <table id="table" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kelas</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classrooms as $classroom)
                        <tr>
                            <td>{{ $classroom->id }}</td>
                            <td>{{ $classroom->classroom }}</td>
                            <td>
                                <a href="{{ route('classroom.edit', $classroom->id) }}"
                                    class="btn btn-warning btn-sm">edit</a>

                                <form method="POST" action="{{ route('classroom.destroy', $classroom->id) }}"
                                    class="d-inline" onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


            </div>
        </section>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/datatables/keytable/keyTable.dataTables.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/datatables/keytable/dataTables.keyTable.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "pageLength": 50,
                'keys': true,
            });
        });
    </script>
@endpush
