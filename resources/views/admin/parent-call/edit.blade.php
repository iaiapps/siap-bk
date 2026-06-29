@extends('layouts.app')

@section('title', 'Edit Panggilan Orang Tua')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body mt-3">
                        @php $readonly = !$parent_call->isPublished(); @endphp

                        <form method="POST" action="{{ route('parent-call.update', $parent_call->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="student_id" class="form-label">Nama Siswa</label>
                                <select class="form-select" name="student_id"
                                    {{ $readonly ? 'disabled' : '' }} required>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}"
                                            {{ $student->id == $parent_call->student_id ? 'selected' : '' }}>
                                            {{ $student->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="call_date" class="form-label">Tanggal Panggilan</label>
                                    <input type="date" class="form-control" id="call_date" name="call_date"
                                        value="{{ old('call_date', $parent_call->call_date) }}"
                                        {{ $readonly ? 'disabled' : '' }} required>
                                </div>
                                <div class="col-md-6">
                                    <label for="letter_number" class="form-label">Nomor Surat</label>
                                    <input type="text" class="form-control" id="letter_number" name="letter_number"
                                        value="{{ old('letter_number', $parent_call->letter_number) }}"
                                        placeholder="Mis: 421/123/SMP.X/2026"
                                        {{ $readonly ? 'disabled' : '' }}>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="call_reason" class="form-label">Alasan Panggilan</label>
                                <textarea class="form-control" id="call_reason" rows="3" name="call_reason"
                                    {{ $readonly ? 'disabled' : '' }}
                                    required>{{ old('call_reason', $parent_call->call_reason) }}</textarea>
                            </div>

                            @if ($parent_call->isCompleted() || $parent_call->isCancelled())
                                <hr>
                                <h6>Hasil Konfirmasi</h6>

                                <div class="mb-3">
                                    <label class="form-label">Kehadiran Orang Tua</label>
                                    <div>
                                        @if ($parent_call->parent_attended)
                                            <span class="badge bg-success">Hadir</span>
                                        @else
                                            <span class="badge bg-danger">Tidak Hadir</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="attendance_date" class="form-label">Tanggal Kehadiran</label>
                                    <input type="date" class="form-control" id="attendance_date"
                                        value="{{ $parent_call->attendance_date }}" disabled>
                                </div>

                                <div class="mb-3">
                                    <label for="follow_up_show" class="form-label">Tindak Lanjut</label>
                                    <textarea class="form-control" id="follow_up_show" rows="2" disabled>{{ $parent_call->follow_up }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="notes_show" class="form-label">Catatan</label>
                                    <textarea class="form-control" id="notes_show" rows="2" disabled>{{ $parent_call->notes }}</textarea>
                                </div>
                            @endif

                            @if ($parent_call->isPublished())
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success">
                                        Simpan Perubahan
                                    </button>
                                </div>
                            @endif
                        </form>

                        @if ($parent_call->isCompleted() || $parent_call->isCancelled())
                            <a href="{{ route('parent-call.index') }}" class="btn btn-secondary">Kembali</a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection