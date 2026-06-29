<?php

namespace App\Http\Controllers;

use App\Models\ParentCall;
use App\Models\Student;
use Illuminate\Http\Request;

class ParentCallController extends Controller
{
    public function index()
    {
        $parentCalls = ParentCall::with('student', 'user')->latest()->get();
        return view('admin.parent-call.index', compact('parentCalls'));
    }

    public function create()
    {
        $students = Student::all();
        return view('admin.parent-call.create', compact('students'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'call_date' => 'required|date',
            'letter_number' => 'nullable|string|max:255',
            'call_reason' => 'required|string',
            'parent_attended' => 'nullable|boolean',
            'attendance_date' => 'nullable|date',
            'notes' => 'nullable|string',
            'follow_up' => 'nullable|string',
        ]);
        $data['user_id'] = auth()->id();
        ParentCall::create($data);
        return redirect()->route('parent-call.index');
    }

    public function show(ParentCall $parentCall)
    {
        //
    }

    public function edit(ParentCall $parentCall)
    {
        $students = Student::all();
        return view('admin.parent-call.edit', compact('parentCall', 'students'));
    }

    public function update(Request $request, ParentCall $parentCall)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'call_date' => 'required|date',
            'letter_number' => 'nullable|string|max:255',
            'call_reason' => 'required|string',
            'parent_attended' => 'nullable|boolean',
            'attendance_date' => 'nullable|date',
            'notes' => 'nullable|string',
            'follow_up' => 'nullable|string',
        ]);
        $parentCall->update($data);
        return redirect()->route('parent-call.index');
    }

    public function destroy(ParentCall $parentCall)
    {
        $parentCall->delete();
        return redirect()->route('parent-call.index');
    }
}
