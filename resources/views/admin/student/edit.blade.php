@extends('layouts.app')

@section('title', 'Edit Siswa')

@section('content')

    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
        <div class="card-body mt-3">
            <form method="POST" action="{{ route('student.update', $student->id) }}">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label for="name" class="col-md-2 col-form-label">Nama Siswa</label>
                    <div class="col-md-10">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name', $student->name) }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="gender" class="col-md-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-md-10">
                        <select class="form-select" id="gender" name="gender" required>
                            <option value="">---pilih jenis kelamin---</option>
                            <option value="L" {{ $student->gender == 'L' ? 'selected' : '' }}>Laki-laki (L)</option>
                            <option value="P" {{ $student->gender == 'P' ? 'selected' : '' }}>Perempuan (P)</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="classroom_id" class="col-md-2 col-form-label">Kelas</label>
                    <div class="col-md-10">
                        <select class="form-select" id="classroom_id" name="classroom_id">
                            <option value="">---pilih kelas---</option>
                            @foreach ($classrooms as $classroom)
                                <option value="{{ $classroom->id }}"
                                    {{ $student->classroom_id == $classroom->id ? 'selected' : '' }}>
                                    {{ $classroom->classroom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success">
                            Simpan Data Siswa
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