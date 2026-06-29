<?php

namespace App\Http\Controllers;

use App\Models\CounselingNote;
use App\Models\Student;
use Illuminate\Http\Request;

class CounselingNoteController extends Controller
{
    public function index()
    {
        $counselingNotes = CounselingNote::with('student', 'user')->latest()->get();
        return view('admin.counseling.index', compact('counselingNotes'));
    }

    public function create()
    {
        $students = Student::all();
        return view('admin.counseling.create', compact('students'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'session_date' => 'required|date',
            'type' => 'required|in:individual,kelompok',
            'problem_area' => 'required|in:pribadi,belajar,sosial,karir',
            'description' => 'required|string',
            'solution' => 'required|string',
            'follow_up' => 'required|string',
            'notes' => 'nullable|string',
        ]);
        $data['user_id'] = auth()->id();
        CounselingNote::create($data);
        return redirect()->route('counseling.index');
    }

    public function show(CounselingNote $counseling)
    {
        //
    }

    public function edit(CounselingNote $counseling)
    {
        $students = Student::all();
        return view('admin.counseling.edit', compact('counseling', 'students'));
    }

    public function update(Request $request, CounselingNote $counseling)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'session_date' => 'required|date',
            'type' => 'required|in:individual,kelompok',
            'problem_area' => 'required|in:pribadi,belajar,sosial,karir',
            'description' => 'required|string',
            'solution' => 'required|string',
            'follow_up' => 'required|string',
            'notes' => 'nullable|string',
        ]);
        $counseling->update($data);
        return redirect()->route('counseling.index');
    }

    public function destroy(CounselingNote $counseling)
    {
        $counseling->delete();
        return redirect()->route('counseling.index');
    }
}
