@extends('layouts.app')

@section('title', 'Janji Temu Baru')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <form method="POST" action="{{ route('appointment.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="student_id" class="form-label">Nama Siswa</label>
                                <select class="form-select" name="student_id" required>
                                    <option selected disabled>---pilih siswa---</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="appointment_date" class="form-label">Tanggal Janji Temu</label>
                                    <input type="date" class="form-control" id="appointment_date" name="appointment_date"
                                        value="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="appointment_time" class="form-label">Jam</label>
                                    <input type="time" class="form-control" id="appointment_time" name="appointment_time"
                                        value="{{ date('H:i') }}" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="reason" class="form-label">Alasan / Tujuan</label>
                                <textarea class="form-control" id="reason" rows="3" name="reason" required
                                    placeholder="Mis: ingin konsultasi masalah belajar, masalah pribadi, dll"></textarea>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">
                                    Simpan Janji Temu
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
