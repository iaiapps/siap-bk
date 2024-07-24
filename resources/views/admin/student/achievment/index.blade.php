@extends('layouts.app')

@section('title', 'Data Prestasi Siswa')

@section('content')

    <a href="{{ route('student.index') }}" class="btn btn-primary mb-3">Kembali</a>
    <a href="{{ route('achievment.create', ['id' => $name->id]) }}" class="btn btn-primary mb-3">Tambah Data</a>

    <div class="card rounded p-3">
        <div class="text-center">
            <p class="fs-5 m-0">Nama Siswa : {{ $name->name }}</p>
        </div>
        <hr>
        <div class="table-responsive">
            <table id="#" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Prestasi</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($achievments as $achievment)
                        <tr>
                            <td>{{ $achievment->id }}</td>
                            <td>{{ $achievment->name_achievment }}</td>
                            <td>{{ $achievment->year_achievment }}</td>
                            <td>
                                <a href="{{ route('achievment.edit', $achievment->id) }}"
                                    class="btn btn-warning btn-sm">edit</a>

                                <form method="POST" action="{{ route('achievment.destroy', $achievment->id) }}"
                                    class="d-inline" onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center"> belum ada data </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/datatables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "pageLength": 50
            });
        });
    </script>
@endpush
