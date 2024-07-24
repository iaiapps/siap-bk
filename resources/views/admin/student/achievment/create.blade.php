@extends('layouts.app')

@section('title', 'Buat Data Prestasi')

@section('content')

    <div class="card">
        <div class="card-body mt-3">
            <form method="POST" action="{{ route('achievment.store') }}">
                @csrf
                <input type="text" name="student_id" value="{{ $name->id }}" readonly hidden>

                <div class="row mb-3">
                    <label for="name" class="col-md-2 col-form-label">Nama Siswa</label>
                    <div class="col-md-10">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $name->name }}"
                            disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-md-2 col-form-label">Nama Prestasi</label>
                    <div class="col-md-10">
                        <input id="name" type="text" class="form-control" name="name_achievment">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="name" class="col-md-2 col-form-label">Tahun Prestasi</label>
                    <div class="col-md-10">
                        <input id="name" type="text" class="form-control" name="year_achievment">
                    </div>
                </div>



                <div class="row mb-0">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success">
                            Tambah Data Prestasi Siswa
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
