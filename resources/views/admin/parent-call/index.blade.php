@extends('layouts.app')

@section('title', 'Panggilan Orang Tua')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <a href="{{ route('parent-call.create') }}" class="btn btn-primary mb-3">Tambah Panggilan</a>

                <div class="card rounded p-3">
                    <div class="table-responsive">
                        <table id="table" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">No. Surat</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Siswa</th>
                                    <th scope="col">Alasan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Guru BK</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($parentCalls as $pc)
                                    <tr>
                                        <td>{{ $pc->id }}</td>
                                        <td>{{ $pc->letter_number ?? '-' }}</td>
                                        <td>{{ $pc->call_date->translatedFormat('j F Y') }}</td>
                                        <td>{{ $pc->student->name }}</td>
                                        <td>{{ Str::limit($pc->call_reason, 40) }}</td>
                                        <td>
                                            @if ($pc->status === 'draft')
                                                <span class="badge bg-secondary">Draft</span>
                                            @elseif ($pc->status === 'published')
                                                <span class="badge bg-primary">Surat Diterbitkan</span>
                                            @elseif ($pc->status === 'completed')
                                                @if ($pc->parent_attended)
                                                    <span class="badge bg-success">Hadir</span>
                                                @else
                                                    <span class="badge bg-danger">Tidak Hadir</span>
                                                @endif
                                            @elseif ($pc->status === 'cancelled')
                                                <span class="badge bg-warning text-dark">Dibatalkan</span>
                                            @endif
                                        </td>
                                        <td>{{ $pc->user->name }}</td>
                                        <td>
                                            @if ($pc->status === 'published')
                                                <a href="{{ route('parent-call.confirm', $pc->id) }}"
                                                    class="btn btn-info btn-sm">konfirmasi</a>
                                            @endif
                                            <a href="{{ route('parent-call.edit', $pc->id) }}"
                                                class="btn btn-warning btn-sm">edit</a>
                                            <form method="POST" action="{{ route('parent-call.destroy', $pc->id) }}"
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