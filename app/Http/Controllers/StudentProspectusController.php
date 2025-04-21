<?php

namespace App\Http\Controllers;

use App\Models\StudentProspectus;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentProspectusController extends Controller
{
    public function index()
    {
        // return StudentProspectus::with('student', 'programProspectus')->get();
        return StudentProspectus::all();
    }

    public function store(Request $request)
    {
        // $student = Student::where('student_id', $request->student_id)->first();
        // $validatedData = $request->validate([
        //     'student_id' => "required|unique:students,student_id,{$student->student_id}",
        //     'prospectus_id' => 'required|exists:program_prospectuses,id',
        //     'enrollment_date' => 'required|date',
        // ]);
        $validatedData = $request->validate([
            'student_id' => 'required|exists:students,student_id',
            'prospectus_id' => 'required|exists:program_prospectus,id',
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
            'prospectus_id' => 'exists:program_prospectus,id',
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
