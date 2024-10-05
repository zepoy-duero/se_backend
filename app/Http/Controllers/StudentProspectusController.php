<?php

namespace App\Http\Controllers;

use App\Models\StudentProspectus;
use Illuminate\Http\Request;

class StudentProspectusController extends Controller
{
    public function index()
    {
        return StudentProspectus::with('student', 'programProspectus')->get();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,id',
            'prospectus_id' => 'required|exists:program_prospectuses,id',
            'enrollment_date' => 'required|date',
        ]);

        return StudentProspectus::create($validatedData);
    }

    public function show($id)
    {
        return StudentProspectus::with('student', 'programProspectus')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $studentProspectus = StudentProspectus::findOrFail($id);

        $validatedData = $request->validate([
            'student_id' => 'exists:students,id',
            'prospectus_id' => 'exists:program_prospectuses,id',
            'enrollment_date' => 'date',
        ]);

        $studentProspectus->update($validatedData);
        return $studentProspectus;
    }

    public function destroy($id)
    {
        $studentProspectus = StudentProspectus::findOrFail($id);
        $studentProspectus->delete();

        return response()->json(['message' => 'Student prospectus deleted successfully']);
    }
}

