<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\StudentDocument;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('parents')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $parents = Parents::all();
        return view('students.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'parents_id' => 'required|exists:parents,id',
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:Male,Female',
            'grade' => 'required|max:20',
            'enrollment_date' => 'nullable|date',
            'profile_picture' => 'nullable|max:255',
            'address' => 'nullable',
            'medical_info' => 'nullable',
            'notes' => 'nullable',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $parents = Parents::all();
        return view('students.edit', compact('student', 'parents'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'parents_id' => 'required|exists:parents,id',
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:Male,Female',
            'grade' => 'required|max:20',
            'enrollment_date' => 'nullable|date',
            'profile_picture' => 'nullable|max:255',
            'address' => 'nullable',
            'medical_info' => 'nullable',
            'notes' => 'nullable',
        ]);

        $student->update($validated);

        return redirect()->route('students.show', $student)->with('success', 'Student updated successfully');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
    public function uploadDocument(Request $request, Student $student)
    {
        $request->validate([
            'document' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
            'document_type' => 'required|string|max:255',
        ]);

        if ($request->file('document')->isValid()) {
            $path = $request->file('document')->store('student_documents', 'public');

            $fullPath = storage_path('app/public/' . $path);

            $document = StudentDocument::create([
                'student_id' => $student->id,
                'document_type' => $request->document_type,
                'file_path' => $path,
            ]);

            return redirect()->route('students.show', $student)->with('success', "Document uploaded successfully. Path: {$fullPath}, Exists: " . (file_exists($fullPath) ? 'Yes' : 'No'));
        }

        return back()->with('error', 'Failed to upload document');
    }

    public function deleteDocument(StudentDocument $document)
    {
        Storage::delete($document->file_path);
        $document->delete();

        return back()->with('success', 'Document deleted successfully');
    }
}