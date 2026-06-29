<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Violation;
use Illuminate\Http\Request;

class ViolationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $violations = Violation::all();
        return view('admin.violation.index', compact('violations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        return view('admin.violation.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        Violation::create($data);
        return redirect()->route('violation.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Violation $violation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Violation $violation)
    {
        $violation->load('student');
        $students = Student::all();
        return view('admin.violation.edit', compact('violation', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Violation $violation)
    {
        $data = $request->validate([
            'violation_name' => 'required|string',
            'point' => 'nullable|string|max:255',
        ]);

        $violation->update($data);

        return redirect()->route('violation.index')->with('success', 'Data pelanggaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Violation $violation)
    {
        $violation->delete();
        return redirect()->route('violation.index')->with('success', 'Data pelanggaran berhasil dihapus.');
    }
}
