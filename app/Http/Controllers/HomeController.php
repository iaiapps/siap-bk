<?php

namespace App\Http\Controllers;

use App\Models\Achievment;
use App\Models\Classroom;
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
        ];

        return view('admin.home', compact('stats'));
    }
}
