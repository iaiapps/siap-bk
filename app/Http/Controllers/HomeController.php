<?php

namespace App\Http\Controllers;

use App\Models\Achievment;
use App\Models\Appointment;
use App\Models\Classroom;
use App\Models\CounselingNote;
use App\Models\ParentCall;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Violation;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stats = [
            'students'    => Student::count(),
            'teachers'    => Teacher::count(),
            'classrooms'  => Classroom::count(),
            'violations'  => Violation::count(),
            'achievements' => Achievment::count(),
            'counseling'  => CounselingNote::count(),
            'appointments' => Appointment::count(),
            'parentCalls' => ParentCall::count(),
        ];

        $recentViolations = Violation::with('student')->latest()->take(5)->get();
        $recentCounseling = CounselingNote::with('student', 'user')->latest()->take(5)->get();

        return view('admin.home', compact('stats', 'recentViolations', 'recentCounseling'));
    }
}
