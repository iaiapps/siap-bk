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

                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">
                                    Terbitkan Panggilan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection