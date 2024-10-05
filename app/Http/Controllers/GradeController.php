<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        return Grade::with('studentProspectus.student', 'studentProspectus.programProspectus')->get();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_prospectus_id' => 'required|exists:student_prospectuses,id',
            'grade_value' => 'required|numeric|min:0|max:100',
        ]);

        return Grade::create($validatedData);
    }

    public function show($id)
    {
        return Grade::with('studentProspectus.student', 'studentProspectus.programProspectus')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $grade = Grade::findOrFail($id);

        $validatedData = $request->validate([
            'student_prospectus_id' => 'exists:student_prospectuses,id',
            'grade_value' => 'numeric|min:0|max:100',
        ]);

        $grade->update($validatedData);
        return $grade;
    }

    public function destroy($id)
    {
        $grade = Grade::findOrFail($id);
        $grade->delete();

        return response()->json(['message' => 'Grade deleted successfully']);
    }
}
