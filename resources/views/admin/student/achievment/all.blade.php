@extends('layouts.app')

@section('title', 'Data Prestasi Siswa')

@section('content')

    <div class="page-content">
        <section class="row">
            <div class="col-12">

    <div class="card rounded p-3">
        <div class="table-responsive">
            <table id="table" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Nama Prestasi</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($achievments as $achievment)
                        <tr>
                            <td>{{ $achievment->id }}</td>
                            <td>{{ $achievment->student->name }}</td>
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
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

            </div>
        </section>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
@endpush
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                pageLength: 50,
                language: {
                    emptyTable: 'belum ada data'
                }
            });
        });
    </script>
@endpush
