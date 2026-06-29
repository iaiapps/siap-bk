@extends('layouts.app')

@section('title', 'Janji Temu Siswa')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <a href="{{ route('appointment.create') }}" class="btn btn-primary mb-3">Tambah Janji Temu</a>

                <div class="card rounded p-3">
                    <div class="table-responsive">
                        <table id="table" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Jam</th>
                                    <th scope="col">Siswa</th>
                                    <th scope="col">Alasan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Guru BK</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $a)
                                    <tr>
                                        <td>{{ $a->id }}</td>
                                        <td>{{ $a->appointment_date }}</td>
                                        <td>{{ $a->appointment_time }}</td>
                                        <td>{{ $a->student->name }}</td>
                                        <td>{{ $a->reason }}</td>
                                        <td>
                                            @php
                                                $badge = match ($a->status) {
                                                    'pending' => 'warning',
                                                    'confirmed' => 'primary',
                                                    'cancelled' => 'danger',
                                                    'completed' => 'success',
                                                };
                                            @endphp
                                            <span class="badge bg-{{ $badge }}">{{ $a->status }}</span>
                                        </td>
                                        <td>{{ $a->user->name }}</td>
                                        <td>
                                            <a href="{{ route('appointment.edit', $a->id) }}"
                                                class="btn btn-warning btn-sm">edit</a>
                                            <form method="POST" action="{{ route('appointment.destroy', $a->id) }}"
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
