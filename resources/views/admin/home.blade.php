@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body py-4">
                    <p class="fs-4 text-center m-0">
                        Selamat Datang di {{ config('app.name', 'SIAP BK') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="row">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon purple">
                                <i class="bi bi-people-fill"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Siswa</h6>
                            <h6 class="font-extrabold mb-0">{{ $stats['students'] }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon blue">
                                <i class="bi bi-person-badge-fill"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Guru</h6>
                            <h6 class="font-extrabold mb-0">{{ $stats['teachers'] }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon green">
                                <i class="bi bi-building"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Kelas</h6>
                            <h6 class="font-extrabold mb-0">{{ $stats['classrooms'] }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon red">
                                <i class="bi bi-exclamation-triangle-fill"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Pelanggaran</h6>
                            <h6 class="font-extrabold mb-0">{{ $stats['violations'] }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon green">
                                <i class="bi bi-trophy-fill"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Prestasi</h6>
                            <h6 class="font-extrabold mb-0">{{ $stats['achievements'] }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon blue">
                                <i class="bi bi-chat-dots-fill"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Konseling</h6>
                            <h6 class="font-extrabold mb-0">{{ $stats['counseling'] }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon purple">
                                <i class="bi bi-calendar-check-fill"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Janji Temu</h6>
                            <h6 class="font-extrabold mb-0">{{ $stats['appointments'] }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon red">
                                <i class="bi bi-telephone-fill"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Panggilan Ortu</h6>
                            <h6 class="font-extrabold mb-0">{{ $stats['parentCalls'] }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Pelanggaran Terbaru</h5>
                    <a href="{{ route('violation.index') }}" class="text-small">Lihat Semua</a>
                </div>
                <div class="card-body">
                    @if ($recentViolations->isNotEmpty())
                        <ul class="list-group list-group-flush">
                            @foreach ($recentViolations as $v)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ $v->student->name }} — {{ $v->violation_name }}</span>
                                    <small class="text-muted">{{ $v->created_at->format('d/m/Y') }}</small>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted mb-0">Belum ada data pelanggaran.</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Konseling Terbaru</h5>
                    <a href="{{ route('counseling.index') }}" class="text-small">Lihat Semua</a>
                </div>
                <div class="card-body">
                    @if ($recentCounseling->isNotEmpty())
                        <ul class="list-group list-group-flush">
                            @foreach ($recentCounseling as $c)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ $c->student->name }} — {{ $c->problem_area }}</span>
                                    <small class="text-muted">{{ $c->session_date }}</small>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted mb-0">Belum ada sesi konseling.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
