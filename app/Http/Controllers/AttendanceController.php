<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Classroom;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::has('students')->with('students')->get();
        return view('attendance.index', compact('classrooms'));
    }
    public function show(Classroom $classroom)
    {
        $attendanceRecords = Attendance::where('classroom_id', $classroom->id)
            ->with('student')  // Eager load the student relationship
            ->get()
            ->groupBy('date');

        return view('attendance.show', compact('classroom', 'attendanceRecords'));
    }
    public function create(Classroom $classroom)
    {
        $currentDate = Carbon::now()->format('d / m / Y');
        return view('attendance.create', compact('classroom', 'currentDate'));
    }

    public function store(Request $request, Classroom $classroom)
    {
        $validatedData = $request->validate([
            'date' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    $parsedDate = Carbon::createFromFormat('d / m / Y', $value);
                    if (!$parsedDate || $parsedDate->format('d / m / Y') !== $value) {
                        $fail('The ' . $attribute . ' is not a valid date in the format dd / mm / yyyy.');
                    }
                },
            ],
            'attendances' => 'required|array',
            'attendances.*.student_id' => 'required|exists:students,id',
            'attendances.*.status' => 'required|in:present,absent,late',
            'attendances.*.notes' => 'nullable|string',
        ]);

        $formattedDate = Carbon::createFromFormat('d / m / Y', $validatedData['date'])->format('Y-m-d');

        foreach ($validatedData['attendances'] as $attendance) {
            Attendance::create([
                'student_id' => $attendance['student_id'],
                'classroom_id' => $classroom->id,
                'date' => $formattedDate,
                'status' => $attendance['status'],
                'notes' => $attendance['notes'] ?? null,
            ]);
        }

        return redirect()->route('attendance.index')->with('success', 'Attendance recorded successfully.');
    }
    public function edit(Classroom $classroom, $date)
    {
        $currentDate = $date;
        $existingAttendance = Attendance::where('classroom_id', $classroom->id)
            ->whereDate('date', $date)
            ->get()
            ->keyBy('student_id');
        return view('attendance.edit', compact('classroom', 'currentDate', 'existingAttendance'));
    }
    public function update(Request $request, Classroom $classroom)
    {
        $request->validate([
            'date' => 'required|date',
            'attendances' => 'required|array',
            'attendances.*.student_id' => 'required|exists:students,id',
            'attendances.*.status' => 'required|in:present,absent,late',
            'attendances.*.notes' => 'nullable|string|max:255',
        ]);

        $date = $request->input('date');

        DB::beginTransaction();

        try {
            foreach ($request->input('attendances') as $studentId => $attendanceData) {
                $attendance = Attendance::updateOrCreate(
                    [
                        'classroom_id' => $classroom->id,
                        'student_id' => $studentId,
                        'date' => $date,
                    ],
                    [
                        'status' => $attendanceData['status'],
                        'notes' => $attendanceData['notes'] ?? null,
                    ]
                );
            }

            DB::commit();

            return redirect()->route('attendance.show', $classroom)
                ->with('success', 'Attendance updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('attendance.show')
                ->with('error', 'An error occurred while updating attendance. Please try again.')
                ->withInput();
        }
    }
    public function destroy(Classroom $classroom, $date)
    {
        try {
            Attendance::where('classroom_id', $classroom->id)
                ->whereDate('date', $date)
                ->delete();

            return redirect()->route('attendance.show', $classroom)
                ->with('success', 'Attendance record for ' . $date . ' has been deleted.');
        } catch (\Exception $e) {
            return redirect()->route('attendance.show', $classroom)
                ->with('error', 'An error occurred while deleting the attendance record.');
        }
    }
}
