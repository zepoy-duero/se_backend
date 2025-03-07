<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use function Laravel\Prompts\select;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->has('search')) {
            $query->where('student_id', 'like', '%' . $request->search . '%')
                ->orWhere('first_name', 'like', '%' . $request->search . '%')
                ->orWhere('last_name', 'like', '%' . $request->search . '%');
        }

        $students = $query->paginate($request->itemsPerPage ?? 10);

        return Response::json([
            'data' => $students->items(),
            'total' => $students->total(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_id' => 'required|unique:students',
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'nullable',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'email' => 'required|email|unique:students',
            'address' => 'required',
            'course' => 'required',
            'year_level' => 'required',
            'college_department' => 'required',
        ]);

        return Student::create($validatedData);
    }

    public function show($id)
    {
        return Student::where('student_id', $id)->with('studentProspectuses')->first();
    }

    public function update(Request $request, $id)
    {
        $student = Student::where('student_id', $id)->first();

        $validatedData = $request->validate([
            'student_id' => "required|unique:students,student_id,{$student->id}",
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'nullable',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'email' => "required|email|unique:students,email,{$student->id}",
            'address' => 'required',
            'course' => 'required',
            'year_level' => 'required',
            'college_department' => 'required',
        ]);
        $student->update($validatedData);
        return $student;
    }

    public function destroy($id)
    {
        $student = student::where('student_id', $id);
        $student->delete();
        return Response::json(['message' => 'Student deleted successfully']);
    }
}
