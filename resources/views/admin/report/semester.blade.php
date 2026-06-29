@extends('layouts.app')

@section('title', 'Laporan BK Semester')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="GET" class="row g-3 align-items-end">
                            <div class="col-md-3">
                                <label for="classroom_id" class="form-label">Kelas</label>
                                <select class="form-select" id="classroom_id" name="classroom_id">
                                    <option value="">Semua Kelas</option>
                                    @foreach ($classrooms as $c)
                                        <option value="{{ $c->id }}"
                                            {{ $classroomId == $c->id ? 'selected' : '' }}>{{ $c->classroom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="year" class="form-label">Tahun</label>
                                <select class="form-select" id="year" name="year">
                                    @for ($y = now()->year; $y >= now()->year - 5; $y--)
                                        <option value="{{ $y }}" {{ $year == $y ? 'selected' : '' }}>
                                            {{ $y }}/{{ $y + 1 }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="semester" class="form-label">Semester</label>
                                <select class="form-select" id="semester" name="semester">
                                    <option value="ganjil" {{ $semester == 'ganjil' ? 'selected' : '' }}>Ganjil</option>
                                    <option value="genap" {{ $semester == 'genap' ? 'selected' : '' }}>Genap</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary w-100">Tampilkan</button>
                            </div>
                            <div class="col-md-2">
                                <a href="javascript:window.print()" class="btn btn-outline-secondary w-100">
                                    <i class="bi bi-printer"></i> Cetak
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                @if ($students->isNotEmpty())
                    <div class="card rounded p-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="mb-0">Periode: {{ $start->format('d M Y') }} — {{ $end->format('d M Y') }}</h6>
                            <small class="text-muted">{{ $students->count() }} siswa</small>
                        </div>
                        <div class="table-responsive">
                            <table id="table" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Pelanggaran</th>
                                        <th>Prestasi</th>
                                        <th>Konseling</th>
                                        <th>Janji Temu</th>
                                        <th>Total</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $i => $s)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $s['student']->nis }}</td>
                                            <td>{{ $s['student']->name }}</td>
                                            <td>{{ $s['student']->classroom->classroom ?? '-' }}</td>
                                            <td>
                                                <span class="badge bg-{{ $s['violations'] > 0 ? 'danger' : 'secondary' }}">
                                                    {{ $s['violations'] }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge bg-{{ $s['achievments'] > 0 ? 'success' : 'secondary' }}">
                                                    {{ $s['achievments'] }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge bg-{{ $s['counseling'] > 0 ? 'info' : 'secondary' }}">
                                                    {{ $s['counseling'] }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge bg-{{ $s['appointments'] > 0 ? 'warning' : 'secondary' }}">
                                                    {{ $s['appointments'] }}
                                                </span>
                                            </td>
                                            <td><strong>{{ $s['total'] }}</strong></td>
                                            <td>
                                                <a href="{{ route('report.semester-student', [
                                                    'student' => $s['student']->id,
                                                    'year' => $year,
                                                    'semester' => $semester,
                                                ]) }}" class="btn btn-sm btn-outline-primary" target="_blank">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @elseif (request()->has('classroom_id'))
                    <div class="alert alert-info">Tidak ada data untuk periode ini.</div>
                @endif
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
