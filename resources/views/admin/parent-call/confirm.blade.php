@extends('layouts.app')

@section('title', 'Konfirmasi Kehadiran Orang Tua')

@section('content')
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <div class="mb-4">
                            <h5>Ringkasan Panggilan</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width:150px">Siswa</th>
                                    <td>{{ $parent_call->student->name }}</td>
                                </tr>
                                <tr>
                                    <th>No. Surat</th>
                                    <td>{{ $parent_call->letter_number ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>{{ $parent_call->call_date->translatedFormat('j F Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Alasan</th>
                                    <td>{{ $parent_call->call_reason }}</td>
                                </tr>
                            </table>
                        </div>

                        <form method="POST" action="{{ route('parent-call.attendance', $parent_call->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Kehadiran Orang Tua</label>
                                <div class="d-flex gap-3 mt-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="parent_attended"
                                            id="attended_yes" value="1" required
                                            onchange="document.getElementById('attendance_group').classList.remove('d-none')">
                                        <label class="form-check-label" for="attended_yes">Hadir</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="parent_attended"
                                            id="attended_no" value="0"
                                            onchange="document.getElementById('attendance_group').classList.add('d-none')">
                                        <label class="form-check-label" for="attended_no">Tidak Hadir</label>
                                    </div>
                                </div>
                            </div>

                            <div id="attendance_group">
                                <div class="mb-3">
                                    <label for="attendance_date" class="form-label">Tanggal Kehadiran</label>
                                    <input type="date" class="form-control" id="attendance_date" name="attendance_date"
                                        value="{{ date('Y-m-d') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="follow_up" class="form-label">Tindak Lanjut</label>
                                    <textarea class="form-control" id="follow_up" rows="2" name="follow_up"
                                        placeholder="Tindak lanjut setelah pertemuan"></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="notes" class="form-label">Catatan Tambahan</label>
                                    <textarea class="form-control" id="notes" rows="2" name="notes"></textarea>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">
                                    Simpan Konfirmasi
                                </button>
                                <a href="{{ route('parent-call.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection