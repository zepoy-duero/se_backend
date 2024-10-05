<?php

namespace App\Http\Controllers;

use App\Models\ProgramProspectus;
use Illuminate\Http\Request;

class ProgramProspectusController extends Controller
{
    public function index()
    {
        return ProgramProspectus::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'program_of_study' => 'required|string|max:100',
            'course_code' => 'required|string|max:50',
            'course_title' => 'required|string|max:255',
            'no_of_hours_lec' => 'required|integer',
            'no_of_hours_lab' => 'required|integer',
            'credit_units' => 'required|integer',
            'pre_requisites' => 'nullable|string|max:255',
        ]);

        return ProgramProspectus::create($validatedData);
    }

    public function show($id)
    {
        return ProgramProspectus::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $programProspectus = ProgramProspectus::findOrFail($id);

        $validatedData = $request->validate([
            'program_of_study' => 'string|max:100',
            'course_code' => 'string|max:50',
            'course_title' => 'string|max:255',
            'no_of_hours_lec' => 'integer',
            'no_of_hours_lab' => 'integer',
            'credit_units' => 'integer',
            'pre_requisites' => 'string|max:255|nullable',
        ]);

        $programProspectus->update($validatedData);
        return $programProspectus;
    }

    public function destroy($id)
    {
        $programProspectus = ProgramProspectus::findOrFail($id);
        $programProspectus->delete();

        return response()->json(['message' => 'Program prospectus deleted successfully']);
    }
}

