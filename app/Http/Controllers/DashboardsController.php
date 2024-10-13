<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\ContactMessage;

class DashboardsController extends Controller
{

    public function index()
    {
        $appointmentsCount = Appointment::count();
        $messagesCount = ContactMessage::count();
        $parentsCount = Parents::count();
        $studentsCount = Student::count();
        $teachersCount = Teacher::count();

        // Fetch latest messages (e.g., last 5)
        $latestMessages = ContactMessage::latest()->take(5)->get();

        // Fetch incoming appointments (e.g., appointments scheduled for today or future)
        // Fetch incoming appointments (appointments scheduled for now or in the future)
        $incomingAppointments = Appointment::where('visit_date_time', '>=', now())
            ->orderBy('visit_date_time', 'asc')
            ->take(5)
            ->get();
        return view('pages.dashboards.index', compact(
            'appointmentsCount',
            'messagesCount',
            'parentsCount',
            'studentsCount',
            'teachersCount',
            'latestMessages',
            'incomingAppointments'
        ));
    }
}