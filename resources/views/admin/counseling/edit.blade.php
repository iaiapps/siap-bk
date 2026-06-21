@extends('layouts.app')

@section('title', 'Edit Sesi Konseling')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <form method="POST" action="{{ route('counseling.update', $counselingNote->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="student_id" class="form-label">Nama Siswa</label>
                                <select class="form-select" name="student_id" required>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}"
                                            {{ $student->id == $counselingNote->student_id ? 'selected' : '' }}>
                                            {{ $student->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="session_date" class="form-label">Tanggal Sesi</label>
                                <input type="date" class="form-control" id="session_date" name="session_date"
                                    value="{{ old('session_date', $counselingNote->session_date) }}" required>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="type" class="form-label">Jenis Konseling</label>
                                    <select class="form-select" id="type" name="type" required>
                                        <option value="individual"
                                            {{ $counselingNote->type == 'individual' ? 'selected' : '' }}>Individual
                                        </option>
                                        <option value="kelompok"
                                            {{ $counselingNote->type == 'kelompok' ? 'selected' : '' }}>Kelompok
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="problem_area" class="form-label">Bidang Masalah</label>
                                    <select class="form-select" id="problem_area" name="problem_area" required>
                                        <option value="pribadi"
                                            {{ $counselingNote->problem_area == 'pribadi' ? 'selected' : '' }}>Pribadi
                                        </option>
                                        <option value="belajar"
                                            {{ $counselingNote->problem_area == 'belajar' ? 'selected' : '' }}>Belajar
                                        </option>
                                        <option value="sosial"
                                            {{ $counselingNote->problem_area == 'sosial' ? 'selected' : '' }}>Sosial
                                        </option>
                                        <option value="karir"
                                            {{ $counselingNote->problem_area == 'karir' ? 'selected' : '' }}>Karir
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi Masalah</label>
                                <textarea class="form-control" id="description" rows="3" name="description"
                                    required>{{ old('description', $counselingNote->description) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="solution" class="form-label">Solusi</label>
                                <textarea class="form-control" id="solution" rows="3" name="solution"
                                    required>{{ old('solution', $counselingNote->solution) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="follow_up" class="form-label">Tindak Lanjut</label>
                                <textarea class="form-control" id="follow_up" rows="3" name="follow_up"
                                    required>{{ old('follow_up', $counselingNote->follow_up) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="notes" class="form-label">Catatan Tambahan</label>
                                <textarea class="form-control" id="notes" rows="2"
                                    name="notes">{{ old('notes', $counselingNote->notes) }}</textarea>
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
