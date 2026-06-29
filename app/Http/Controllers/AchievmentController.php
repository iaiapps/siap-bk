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
        if (!$id) {
            return redirect()->route('student.index')->with('error', 'Pilih siswa terlebih dahulu.');
        }
        $name = Student::findOrFail($id);
        $achievments = Achievment::where('student_id', '=', $id)->get();
        return view('admin.student.achievment.index', compact('achievments', 'name'));
    }

    public function all()
    {
        $achievments = Achievment::with('student')->get();
        return view('admin.student.achievment.all', compact('achievments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $id = $request->id;
        if (!$id) {
            return redirect()->route('student.index')->with('error', 'Pilih siswa terlebih dahulu.');
        }
        $name = Student::findOrFail($id);
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
        $achievment->load('student');
        return view('admin.student.achievment.edit', compact('achievment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Achievment $achievment)
    {
        $data = $request->validate([
            'name_achievment' => 'required|string|max:255',
            'year_achievment' => 'required|string|max:20',
        ]);

        $achievment->update($data);

        return redirect()->route('achievment.index', ['id' => $achievment->student_id])
            ->with('success', 'Data prestasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Achievment $achievment)
    {
        $studentId = $achievment->student_id;
        $achievment->delete();

        return redirect()->route('achievment.index', ['id' => $studentId])
            ->with('success', 'Data prestasi berhasil dihapus.');
    }
}
