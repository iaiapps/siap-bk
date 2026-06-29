<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Student;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('student', 'user')->latest()->get();
        return view('admin.appointment.index', compact('appointments'));
    }

    public function create()
    {
        $students = Student::all();
        return view('admin.appointment.create', compact('students'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'reason' => 'required|string',
            'status' => 'nullable|in:pending,confirmed,cancelled,completed',
            'notes' => 'nullable|string',
        ]);
        $data['user_id'] = auth()->id();
        $data['status'] ??= 'pending';
        Appointment::create($data);
        return redirect()->route('appointment.index');
    }

    public function show(Appointment $appointment)
    {
        //
    }

    public function edit(Appointment $appointment)
    {
        $students = Student::all();
        return view('admin.appointment.edit', compact('appointment', 'students'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'reason' => 'required|string',
            'status' => 'nullable|in:pending,confirmed,cancelled,completed',
            'notes' => 'nullable|string',
        ]);
        $data['status'] ??= 'pending';
        $appointment->update($data);
        return redirect()->route('appointment.index');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointment.index');
    }
}
