@extends('layouts.app')

@section('title', 'Buat Kelas Baru')

@section('content')

    <div class="card">
        <div class="card-body mt-3">
            <form method="POST" action="{{ route('classroom.store') }}">
                @csrf
                <div class=" mb-3">
                    <label for="classroom" class="form-label">Nama Kelas</label>

                    <input id="classroom" type="text" class="form-control @error('classroom') is-invalid @enderror"
                        name="classroom" value="{{ old('classroom') }}" required autocomplete="classroom" autofocus>
                    @error('classroom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">
                        Tambah Kelas Baru
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
