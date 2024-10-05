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
        return Student::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validatedData = $request->validate([
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
        $student = Student::findOrFail($id);
        $student->delete();
        return response()->json(['message' => 'Student deleted successfully']);
    }
}

