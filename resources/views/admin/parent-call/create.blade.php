@extends('layouts.app')

@section('title', 'Panggilan Orang Tua Baru')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <form method="POST" action="{{ route('parent-call.store') }}">
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
                                    <label for="call_date" class="form-label">Tanggal Panggilan</label>
                                    <input type="date" class="form-control" id="call_date" name="call_date"
                                        value="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="letter_number" class="form-label">Nomor Surat</label>
                                    <input type="text" class="form-control" id="letter_number" name="letter_number"
                                        placeholder="Mis: 421/123/SMP.X/2026">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="call_reason" class="form-label">Alasan Panggilan</label>
                                <textarea class="form-control" id="call_reason" rows="3" name="call_reason" required
                                    placeholder="Jelaskan alasan orang tua dipanggil ke sekolah"></textarea>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Kehadiran Orang Tua</label>
                                    <div class="d-flex gap-3 mt-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="parent_attended"
                                                id="attended_yes" value="1">
                                            <label class="form-check-label" for="attended_yes">Hadir</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="parent_attended"
                                                id="attended_no" value="0">
                                            <label class="form-check-label" for="attended_no">Tidak Hadir</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="attendance_date" class="form-label">Tanggal Kehadiran</label>
                                    <input type="date" class="form-control" id="attendance_date" name="attendance_date">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="follow_up" class="form-label">Tindak Lanjut</label>
                                <textarea class="form-control" id="follow_up" rows="2" name="follow_up"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="notes" class="form-label">Catatan Tambahan</label>
                                <textarea class="form-control" id="notes" rows="2" name="notes"></textarea>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">
                                    Simpan Panggilan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
