@extends('layouts.app')

@section('title', 'Edit Kelas')

@section('content')

    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <form method="POST" action="{{ route('classroom.update', $classroom->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="classroom" class="col-md-2 col-form-label">{{ __('Nama Kelas') }}</label>
                                <div class="col-md-10">
                                    <input id="classroom" type="text"
                                        class="form-control @error('classroom') is-invalid @enderror" name="classroom"
                                        value="{{ old('classroom', $classroom->classroom) }}" required autocomplete="classroom"
                                        autofocus>

                                    @error('classroom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success">
                                        Simpan Data Kelas
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
