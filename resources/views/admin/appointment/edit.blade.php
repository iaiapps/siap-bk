@extends('layouts.app')

@section('title', 'Edit Janji Temu')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <form method="POST" action="{{ route('appointment.update', $appointment->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="student_id" class="form-label">Nama Siswa</label>
                                <select class="form-select" name="student_id" required>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}"
                                            {{ $student->id == $appointment->student_id ? 'selected' : '' }}>
                                            {{ $student->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="appointment_date" class="form-label">Tanggal Janji Temu</label>
                                    <input type="date" class="form-control" id="appointment_date" name="appointment_date"
                                        value="{{ old('appointment_date', $appointment->appointment_date) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="appointment_time" class="form-label">Jam</label>
                                    <input type="time" class="form-control" id="appointment_time" name="appointment_time"
                                        value="{{ old('appointment_time', $appointment->appointment_time) }}" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="reason" class="form-label">Alasan / Tujuan</label>
                                <textarea class="form-control" id="reason" rows="3" name="reason"
                                    required>{{ old('reason', $appointment->reason) }}</textarea>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="notes" class="form-label">Catatan Guru BK</label>
                                    <textarea class="form-control" id="notes" rows="2"
                                        name="notes">{{ old('notes', $appointment->notes) }}</textarea>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
