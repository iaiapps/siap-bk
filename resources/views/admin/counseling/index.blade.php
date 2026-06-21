@extends('layouts.app')

@section('title', 'Catatan Konseling')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <a href="{{ route('counseling.create') }}" class="btn btn-primary mb-3">Tambah Sesi Konseling</a>

                <div class="card rounded p-3">
                    <div class="table-responsive">
                        <table id="table" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Siswa</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Bidang Masalah</th>
                                    <th scope="col">Guru BK</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($counselingNotes as $note)
                                    <tr>
                                        <td>{{ $note->id }}</td>
                                        <td>{{ $note->session_date }}</td>
                                        <td>{{ $note->student->name }}</td>
                                        <td>{{ $note->type }}</td>
                                        <td>{{ $note->problem_area }}</td>
                                        <td>{{ $note->user->name }}</td>
                                        <td>
                                            <a href="{{ route('counseling.edit', $note->id) }}"
                                                class="btn btn-warning btn-sm">edit</a>
                                            <form method="POST" action="{{ route('counseling.destroy', $note->id) }}"
                                                class="d-inline"
                                                onsubmit="return confirm('Apakah anda yakin untuk menghapus data ?');">
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
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "pageLength": 50
            });
        });
    </script>
@endpush
