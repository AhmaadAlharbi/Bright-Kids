<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterNewStudentsController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'father_first_name' => 'required|string|max:50',
                'father_last_name' => 'required|string|max:50',
                'father_occupation' => 'required|string|max:100',
                'father_phone' => 'required|string|max:20',
                'father_email' => 'required|email|max:100',
                'mother_first_name' => 'required|string|max:50',
                'mother_last_name' => 'required|string|max:50',
                'mother_occupation' => 'required|string|max:100',
                'mother_phone' => 'required|string|max:20',
                'mother_email' => 'required|email|max:100',
                'home_address' => 'required|string',
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                'date_of_birth' => 'required|date',
                'gender' => 'required|in:Male,Female',
                'grade' => 'required|string|max:20',
                'enrollment_date' => 'nullable|date',
                'profile_picture' => 'nullable|image|max:2048',
                'address' => 'nullable|string',
                'medical_info' => 'nullable|string',
                'notes' => 'nullable|string',
                'documents.*' => 'nullable|file|max:10240',
                'document_types.*' => 'required_with:documents.*|string|max:50', // Add this line

            ]);

            DB::beginTransaction();

            // Create parent
            $parent = Parents::create([
                'father_first_name' => $validated['father_first_name'],
                'father_last_name' => $validated['father_last_name'],
                'father_occupation' => $validated['father_occupation'],
                'father_phone' => $validated['father_phone'],
                'father_email' => $validated['father_email'],
                'mother_first_name' => $validated['mother_first_name'],
                'mother_last_name' => $validated['mother_last_name'],
                'mother_occupation' => $validated['mother_occupation'],
                'mother_phone' => $validated['mother_phone'],
                'mother_email' => $validated['mother_email'],
                'home_address' => $validated['home_address'],
            ]);

            // Handle profile picture upload
            $profilePicturePath = null;
            if ($request->hasFile('profile_picture')) {
                $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            }

            // Create student
            $student = Student::create([
                'parents_id' => $parent->id,
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'date_of_birth' => $validated['date_of_birth'],
                'gender' => $validated['gender'],
                'grade' => $validated['grade'],
                'enrollment_date' => $validated['enrollment_date'],
                'profile_picture' => $profilePicturePath,
                'address' => $validated['address'],
                'medical_info' => $validated['medical_info'],
                'notes' => $validated['notes'],
            ]);

            // Handle document uploads
            if ($request->hasFile('documents')) {
                foreach ($request->file('documents') as $key => $document) {
                    $path = $document->store('student_documents', 'public');
                    $student->documents()->create([
                        'file_path' => $path,
                        'file_name' => $document->getClientOriginalName(),
                        'document_type' => $request->input('document_types.' . $key, 'Other'), // Add this line
                    ]);
                }
            }


            DB::commit();

            return back()->with('success', 'Student and parent registered successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Registration error: ' . $e->getMessage());
            return back()->with('error', 'An unexpected error occurred during registration. Please try again.')->withInput();
        }
    }
}