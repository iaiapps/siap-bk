@extends('layouts.app')

@section('title', 'Edit Prestasi')

@section('content')

    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <form method="POST" action="{{ route('achievment.update', $achievment->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="student_id" value="{{ $achievment->student_id }}">

                            <div class="row mb-3">
                                <label for="name" class="col-md-2 col-form-label">Nama Siswa</label>
                                <div class="col-md-10">
                                    <input id="name" type="text" class="form-control"
                                        value="{{ $achievment->student->name ?? '' }}" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name_achievment" class="col-md-2 col-form-label">Nama Prestasi</label>
                                <div class="col-md-10">
                                    <input id="name_achievment" type="text" class="form-control" name="name_achievment"
                                        value="{{ old('name_achievment', $achievment->name_achievment) }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="year_achievment" class="col-md-2 col-form-label">Tahun Prestasi</label>
                                <div class="col-md-10">
                                    <input id="year_achievment" type="text" class="form-control" name="year_achievment"
                                        value="{{ old('year_achievment', $achievment->year_achievment) }}">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success">
                                        Simpan Data Prestasi
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
