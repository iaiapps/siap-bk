@extends('layouts.app')

@section('title', 'Edit Pelanggaran')

@section('content')

    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <form method="POST" action="{{ route('violation.update', $violation->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="student_id" class="form-label">Nama Siswa</label>
                                <input type="text" class="form-control" disabled
                                    value="{{ $violation->student->name ?? '' }}">
                            </div>

                            <div class="mb-3">
                                <label for="violation_name" class="form-label">Keterangan pelanggaran</label>
                                <textarea class="form-control" id="violation_name" rows="3"
                                    name="violation_name">{{ old('violation_name', $violation->violation_name) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="point" class="form-label">Poin</label>
                                <input type="text" class="form-control" id="point" name="point"
                                    value="{{ old('point', $violation->point) }}">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">
                                    Simpan Data Pelanggaran
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
