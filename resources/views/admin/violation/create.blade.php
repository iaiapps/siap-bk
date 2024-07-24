@extends('layouts.app')

@section('title', 'Buat Data Baru')

@section('content')

    <div class="card">
        <div class="card-body mt-3">
            <form method="POST" action="{{ route('violation.store') }}">
                @csrf
                <div class=" mb-3">
                    <label for="nama_siswa" class="form-label">Nama Siswa</label>
                    <select class="form-select" aria-label="nama_siswa" name="student_id">
                        <option selected>---pilih siswa---</option>
                        @foreach ($students as $student)
                            <option value={{ $student->id }}>{{ $student->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="violation" class="form-label">Keterangan pelanggaran</label>
                    <textarea class="form-control" id="violation" rows="3" name="violation_name"></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">
                        Tambah Data Baru
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
