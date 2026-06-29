@extends('layouts.app')

@section('title', 'Import / Export Data Siswa')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="card rounded p-3 mb-3">
                <div class="card-header">
                    <h5>Export Data Siswa</h5>
                </div>
                <div class="card-body">
                    <p>Download seluruh data siswa ke file Excel.</p>
                    <a href="{{ route('import-export.export') }}" class="btn btn-success">
                        <i class="bi bi-download me-1"></i> Export Excel
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card rounded p-3 mb-3">
                <div class="card-header">
                    <h5>Import Data Siswa</h5>
                </div>
                <div class="card-body">
                    <p>Upload file Excel dengan kolom: <strong>nama</strong>, <strong>jenis_kelamin</strong> (L/P),
                        <strong>kelas</strong>.</p>
                    <form action="{{ route('import-export.import') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input type="file" name="file" class="form-control @error('file') is-invalid @enderror"
                                accept=".xlsx,.xls,.csv" required>
                            @error('file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-upload me-1"></i> Import
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
