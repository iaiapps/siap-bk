<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Achievment;
use Illuminate\Http\Request;

class AchievmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id = $request->id;
        // dd($id);
        $name = Student::where('id', '=', $id)->first();
        $achievments = Achievment::where('student_id', '=', $id)->get();
        return view('admin.student.achievment.index', compact('achievments', 'name'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $id = $request->id;
        $name = Student::where('id', '=', $id)->first();
        return view('admin.student.achievment.create', compact('name'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->student_id;
        $data = $request->all();
        Achievment::create($data);
        return redirect()->route('achievment.index', ['id' => $id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Achievment $achievment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Achievment $achievment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Achievment $achievment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achievment $achievment)
    {
        //
    }
}
