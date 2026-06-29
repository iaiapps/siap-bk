<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function semester(Request $request)
    {
        $classrooms = Classroom::all();
        $year = $request->year ?? date('Y');
        $semester = $request->semester ?? (now()->month >= 7 ? 'ganjil' : 'genap');
        $classroomId = $request->classroom_id;

        [$start, $end] = $this->semesterRange($year, $semester);

        $students = Student::when($classroomId, fn($q) => $q->where('classroom_id', $classroomId))
            ->with(['violations' => fn($q) => $q->whereBetween('created_at', [$start, $end])])
            ->with(['achievments' => fn($q) => $q->whereBetween('created_at', [$start, $end])])
            ->with(['counselingNotes' => fn($q) => $q->whereBetween('session_date', [$start, $end])])
            ->with(['appointments' => fn($q) => $q->whereBetween('appointment_date', [$start, $end])])
            ->with('classroom')
            ->get()
            ->map(fn($s) => [
                'student' => $s,
                'violations' => $s->violations->count(),
                'achievments' => $s->achievments->count(),
                'counseling' => $s->counselingNotes->count(),
                'appointments' => $s->appointments->count(),
                'total' => $s->violations->count() + $s->achievments->count() +
                    $s->counselingNotes->count() + $s->appointments->count(),
            ]);

        return view('admin.report.semester', compact(
            'classrooms', 'students', 'year', 'semester', 'classroomId', 'start', 'end'
        ));
    }

    public function semesterStudent(Student $student, Request $request)
    {
        $year = $request->year ?? date('Y');
        $semester = $request->semester ?? (now()->month >= 7 ? 'ganjil' : 'genap');
        [$start, $end] = $this->semesterRange($year, $semester);

        $violations = $student->violations()->whereBetween('created_at', [$start, $end])->latest()->get();
        $achievments = $student->achievments()->whereBetween('created_at', [$start, $end])->latest()->get();
        $counselingNotes = $student->counselingNotes()->whereBetween('session_date', [$start, $end])->latest()->get();
        $appointments = $student->appointments()->whereBetween('appointment_date', [$start, $end])->latest()->get();

        $student->load('classroom');

        return view('admin.report.semester-student', compact(
            'student', 'violations', 'achievments', 'counselingNotes', 'appointments',
            'year', 'semester', 'start', 'end'
        ));
    }

    private function semesterRange(string $year, string $semester): array
    {
        if ($semester === 'ganjil') {
            return [Carbon::create($year, 7, 1), Carbon::create($year, 12, 31)];
        }
        return [Carbon::create($year, 1, 1), Carbon::create($year, 6, 30)];
    }
}
