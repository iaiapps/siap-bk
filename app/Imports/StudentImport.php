<?php

namespace App\Imports;

use App\Models\Classroom;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentImport implements ToModel, WithHeadingRow, WithValidation
{
    public function model(array $row)
    {
        $classroom = null;
        if (!empty($row['kelas'])) {
            $classroom = Classroom::firstOrCreate(['classroom' => $row['kelas']]);
        }

        return new Student([
            'name' => $row['nama'],
            'gender' => $row['jenis_kelamin'],
            'classroom_id' => $classroom?->id,
        ]);
    }

    public function rules(): array
    {
        return [
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'kelas' => 'nullable|string|max:255',
        ];
    }

    public function customValidationMessages(): array
    {
        return [
            'nama.required' => 'Kolom nama wajib diisi',
            'jenis_kelamin.required' => 'Kolom jenis_kelamin wajib diisi (L/P)',
            'jenis_kelamin.in' => 'Jenis kelamin harus L atau P',
        ];
    }
}
