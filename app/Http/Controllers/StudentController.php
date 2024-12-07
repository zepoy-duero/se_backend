<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return Student::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|string|max:100',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'date_of_birth' => 'required|date',
            'email' => 'required|email|unique:students,email',
            'address' => 'required|string|max:255',
        ]);

        return Student::create($validatedData);
    }

    public function show($id)
    {
        return Student::where('student_id', $id)->first();
    }

    public function update(Request $request, $id)
    {
        $student = Student::where('student_id', $id)->first();

        $validatedData = $request->validate([
            'student_id' => 'required|string|max:100',
            'first_name' => 'string|max:100',
            'last_name' => 'string|max:100',
            'date_of_birth' => 'date',
            'email' => 'email|unique:students,email,' . $student->id,
            'address' => 'string|max:255',
        ]);

        $student->update($validatedData);
        return $student;
    }

    public function destroy($id)
    {
        $student = where('student_id', $id);
        $student->delete();
        return response()->json(['message' => 'Student deleted successfully']);
    }
}
