@extends('layouts.app')

@section('title', 'Riwayat ' . $student->name)

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <a href="{{ route('student.index') }}" class="btn btn-primary mb-3">Kembali</a>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Riwayat Kronologis — {{ $student->name }}</h4>
                    </div>
                    <div class="card-body">
                        @forelse ($timeline as $item)
                            @php
                                $badge = match ($item['type']) {
                                    'pelanggaran' => 'danger',
                                    'prestasi' => 'success',
                                    'konseling' => 'info',
                                };
                                $icon = match ($item['type']) {
                                    'pelanggaran' => 'bi-x-circle',
                                    'prestasi' => 'bi-trophy',
                                    'konseling' => 'bi-chat-dots',
                                };
                            @endphp
                            <div class="d-flex mb-4">
                                <div class="me-3">
                                    <span class="badge bg-{{ $badge }} p-2">
                                        <i class="bi {{ $icon }}"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <strong>{{ $item['title'] }}</strong>
                                        <small class="text-muted">{{ $item['date']->translatedFormat('j F Y') }}</small>
                                    </div>
                                    @if ($item['body'])
                                        <p class="mb-0 mt-1">{{ $item['body'] }}</p>
                                    @endif
                                    <small class="text-{{ $badge }} text-uppercase">{{ $item['type'] }}</small>
                                </div>
                            </div>
                            @if (!$loop->last)
                                <hr class="my-0 mb-3">
                            @endif
                        @empty
                            <p class="text-center text-muted">Belum ada riwayat untuk siswa ini.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
