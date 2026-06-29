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
        ]);
        $data['user_id'] = auth()->id();
        $data['status'] = 'published';
        ParentCall::create($data);
        return redirect()->route('parent-call.index')->with('success', 'Panggilan orang tua berhasil diterbitkan.');
    }

    public function show(ParentCall $parent_call)
    {
        return redirect()->route('parent-call.edit', $parent_call->id);
    }

    public function edit(ParentCall $parent_call)
    {
        $students = Student::all();
        return view('admin.parent-call.edit', compact('parent_call', 'students'));
    }

    public function update(Request $request, ParentCall $parent_call)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'call_date' => 'required|date',
            'letter_number' => 'nullable|string|max:255',
            'call_reason' => 'required|string',
        ]);

        $updated = ParentCall::where('id', $parent_call->id)->where('status', 'published')->update($data);
        abort_unless($updated, 403, 'Tidak bisa mengedit panggilan yang sudah dikonfirmasi.');

        return redirect()->route('parent-call.index')->with('success', 'Data panggilan berhasil diperbarui.');
    }

    public function destroy(ParentCall $parent_call)
    {
        abort_if(!$parent_call->isPublished(), 403, 'Tidak bisa menghapus panggilan yang sudah dikonfirmasi.');
        $parent_call->delete();
        return redirect()->route('parent-call.index')->with('success', 'Panggilan berhasil dihapus.');
    }

    public function confirm(ParentCall $parent_call)
    {
        abort_if(!$parent_call->isPublished(), 403, 'Panggilan sudah dikonfirmasi sebelumnya.');
        $parent_call->load('student');
        return view('admin.parent-call.confirm', compact('parent_call'));
    }

    public function markAttendance(Request $request, ParentCall $parent_call)
    {
        $data = $request->validate([
            'parent_attended' => 'required|boolean',
            'attendance_date' => 'nullable|date',
            'follow_up' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $data['status'] = $data['parent_attended'] ? 'completed' : 'cancelled';

        $updated = ParentCall::where('id', $parent_call->id)->where('status', 'published')->update($data);
        abort_unless($updated, 403, 'Panggilan sudah dikonfirmasi sebelumnya.');

        $msg = $data['parent_attended']
            ? 'Kehadiran orang tua berhasil dicatat.'
            : 'Panggilan dibatalkan.';

        return redirect()->route('parent-call.index')->with('success', $msg);
    }
}
