@extends('layouts.app')

@section('title', 'Laporan BK — ' . $student->name)

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-3 no-print">
                    <a href="{{ route('report.semester', ['classroom_id' => $student->classroom_id, 'year' => $year, 'semester' => $semester]) }}"
                        class="btn btn-outline-secondary">Kembali</a>
                    <a href="javascript:window.print()" class="btn btn-primary">
                        <i class="bi bi-printer"></i> Cetak
                    </a>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <h5>LAPORAN BIMBINGAN DAN KONSELING</h5>
                            <h6>SEMESTER {{ strtoupper($semester) }} TAHUN {{ $year }}/{{ $year + 1 }}</h6>
                        </div>

                        <table class="table table-sm table-borderless" style="width: auto">
                            <tr><td>Nama Siswa</td><td>: <strong>{{ $student->name }}</strong></td></tr>
                            <tr><td>NIS</td><td>: {{ $student->nis }}</td></tr>
                            <tr><td>Kelas</td><td>: {{ $student->classroom->classroom ?? '-' }}</td></tr>
                            <tr><td>Periode</td><td>: {{ $start->translatedFormat('j F Y') }} — {{ $end->translatedFormat('j F Y') }}</td></tr>
                        </table>

                        <hr>

                        @if ($violations->isNotEmpty())
                            <h6 class="text-danger">Catatan Pelanggaran</h6>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr><th>Tanggal</th><th>Pelanggaran</th></tr>
                                </thead>
                                <tbody>
                                    @foreach ($violations as $v)
                                        <tr><td>{{ $v->created_at->translatedFormat('j F Y') }}</td><td>{{ $v->violation_name }}</td></tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                        @if ($achievments->isNotEmpty())
                            <h6 class="text-success">Catatan Prestasi</h6>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr><th>Tanggal</th><th>Prestasi</th><th>Tahun</th></tr>
                                </thead>
                                <tbody>
                                    @foreach ($achievments as $a)
                                        <tr><td>{{ $a->created_at->translatedFormat('j F Y') }}</td><td>{{ $a->name_achievment }}</td><td>{{ $a->year_achievment }}</td></tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                        @if ($counselingNotes->isNotEmpty())
                            <h6 class="text-info">Catatan Konseling</h6>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr><th>Tanggal</th><th>Jenis</th><th>Bidang</th><th>Deskripsi</th><th>Tindak Lanjut</th></tr>
                                </thead>
                                <tbody>
                                    @foreach ($counselingNotes as $c)
                                        <tr>
                                            <td>{{ $c->session_date->translatedFormat('j F Y') }}</td>
                                            <td>{{ $c->type === 'individual' ? 'Individual' : 'Kelompok' }}</td>
                                            <td>{{ $c->problem_area }}</td>
                                            <td>{{ $c->description }}</td>
                                            <td>{{ $c->follow_up }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                        @if ($appointments->isNotEmpty())
                            <h6 class="text-warning">Janji Temu</h6>
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr><th>Tanggal</th><th>Jam</th><th>Alasan</th><th>Status</th></tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointments as $a)
                                        <tr><td>{{ $a->appointment_date->translatedFormat('j F Y') }}</td><td>{{ $a->appointment_time }}</td><td>{{ $a->reason }}</td><td>{{ match($a->status) { 'pending' => 'Menunggu', 'confirmed' => 'Dikonfirmasi', 'cancelled' => 'Dibatalkan', 'completed' => 'Selesai' } }}</td></tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                        @if ($violations->isEmpty() && $achievments->isEmpty() && $counselingNotes->isEmpty() && $appointments->isEmpty())
                            <div class="alert alert-secondary">Tidak ada catatan BK untuk periode ini.</div>
                        @endif

                        <hr class="mt-4">
                        <div class="row mt-4">
                            <div class="col-6 text-center">
                                <p>Mengetahui,<br>Kepala Sekolah</p>
                                <br><br><br>
                                <p>(________________________)</p>
                            </div>
                            <div class="col-6 text-center">
                                <p>{{ $start->translatedFormat('j F Y') }}<br>Guru BK</p>
                                <br><br><br>
                                <p>(________________________)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
