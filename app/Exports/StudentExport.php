<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Student::with('classroom')->get();
    }

    public function headings(): array
    {
        return ['Nama', 'Jenis Kelamin', 'Kelas'];
    }

    public function map($student): array
    {
        return [
            $student->name,
            $student->gender,
            $student->classroom->classroom ?? '',
        ];
    }
}
