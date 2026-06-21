@extends('layouts.app')

@section('title', 'Sesi Konseling Baru')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <form method="POST" action="{{ route('counseling.store') }}">
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

                            <div class="mb-3">
                                <label for="session_date" class="form-label">Tanggal Sesi</label>
                                <input type="date" class="form-control" id="session_date" name="session_date"
                                    value="{{ date('Y-m-d') }}" required>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="type" class="form-label">Jenis Konseling</label>
                                    <select class="form-select" id="type" name="type" required>
                                        <option value="individual">Individual</option>
                                        <option value="kelompok">Kelompok</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="problem_area" class="form-label">Bidang Masalah</label>
                                    <select class="form-select" id="problem_area" name="problem_area" required>
                                        <option value="pribadi">Pribadi</option>
                                        <option value="belajar">Belajar</option>
                                        <option value="sosial">Sosial</option>
                                        <option value="karir">Karir</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi Masalah</label>
                                <textarea class="form-control" id="description" rows="3" name="description" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="solution" class="form-label">Solusi</label>
                                <textarea class="form-control" id="solution" rows="3" name="solution" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="follow_up" class="form-label">Tindak Lanjut</label>
                                <textarea class="form-control" id="follow_up" rows="3" name="follow_up" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="notes" class="form-label">Catatan Tambahan</label>
                                <textarea class="form-control" id="notes" rows="2" name="notes"></textarea>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">
                                    Simpan Sesi Konseling
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
