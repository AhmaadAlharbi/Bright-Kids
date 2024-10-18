<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all appointments from the database
        $appointments = Appointment::all();

        // Return the appointments view with the appointments data
        return view('appointments.index', compact('appointments'));
    }


    /**
     * Show the form for creating a new resource.
     */
    /**
     * Show the form for creating a new appointment.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Return the view for creating a new appointment
        return view('appointments.create');
    }

    /**
     * Store a newly created appointment in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'child_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'father_phone' => 'required|string|max:15',
            'mother_phone' => 'required|string|max:15',
            'father_workplace' => 'required|string|max:255',
            'mother_workplace' => 'required|string|max:255',
            'status' => 'nullable|string|max:255',
            'branch' => 'required|string|max:255', // Add this line

        ]);

        // Create a new appointment
        Appointment::create($request->all());

        // Redirect back to the appointments index with a success message
        return redirect()->route('appointments.index')->with('success', 'Appointment booked successfully!');
    }

    /**
     * Show the specified appointment.
     *
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\View\View
     */
    public function show(Appointment $appointment)
    {
        // Return the view for showing a specific appointment
        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified appointment.
     *
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\View\View
     */
    public function edit(Appointment $appointment)
    {
        // Return the view for editing an existing appointment
        return view('appointments.edit', compact('appointment'));
    }

    /**
     * Update the specified appointment in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Appointment $appointment)
    {
        // Validate the request data
        $request->validate([
            'child_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'father_phone' => 'required|string|max:15',
            'mother_phone' => 'required|string|max:15',
            'father_workplace' => 'required|string|max:255',
            'mother_workplace' => 'required|string|max:255',
            'visit_date_time' => 'required|date',
            'status' => 'nullable|string|max:255',
        ]);

        // Update the appointment with the request data
        $appointment->update($request->all());

        // Redirect back to the appointments index with a success message
        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully!');
    }

    /**
     * Remove the specified appointment from storage.
     *
     * @param \App\Models\Appointment $appointment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Appointment $appointment)
    {
        // Delete the appointment
        $appointment->delete();

        // Redirect back to the appointments index with a success message
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully!');
    }
    public function updateStatus(Request $request, Appointment $appointment)
    {
        // Validate the incoming request
        $request->validate([
            'status' => 'required|in:uncompleted,completed',
        ]);

        // Update the appointment's status
        $appointment->update($request->only('status'));

        // Redirect back with a success message
        return redirect()->route('appointments.index')->with('success', 'Appointment status updated successfully.');
    }
}
