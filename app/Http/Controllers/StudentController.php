<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('admin.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Student::create($data);
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    public function timeline(Student $student)
    {
        $violations = $student->violations()->latest()->get();
        $achievments = $student->achievments()->latest()->get();
        $counselingNotes = $student->counselingNotes()->latest()->get();

        $timeline = collect()
            ->merge($violations->map(fn($v) => [
                'date' => $v->created_at,
                'type' => 'pelanggaran',
                'title' => $v->violation_name,
                'body' => null,
            ]))
            ->merge($achievments->map(fn($a) => [
                'date' => $a->created_at,
                'type' => 'prestasi',
                'title' => $a->name_achievment . ' (' . $a->year_achievment . ')',
                'body' => null,
            ]))
            ->merge($counselingNotes->map(fn($c) => [
                'date' => $c->session_date,
                'type' => 'konseling',
                'title' => 'Sesi ' . $c->type . ' — ' . $c->problem_area,
                'body' => $c->description,
            ]))
            ->sortByDesc('date')
            ->values();

        return view('admin.student.timeline', compact('student', 'timeline'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
