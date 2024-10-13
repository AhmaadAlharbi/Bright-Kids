@extends('layouts.master')

@section('styles')



@endsection

@section('content')
<div class="dashboard-container">
    <!-- Existing Widgets -->
    <div class="dashboard-widgets">
        <div class="dashboard-widget appointments">
            <div class="widget-header">Appointments</div>
            <div class="widget-body">
                <h5 class="widget-title">{{ $appointmentsCount }}</h5>
            </div>
        </div>
        <div class="dashboard-widget messages">
            <div class="widget-header">Messages</div>
            <div class="widget-body">
                <h5 class="widget-title">{{ $messagesCount }}</h5>
            </div>
        </div>
        <div class="dashboard-widget parents">
            <div class="widget-header">Parents</div>
            <div class="widget-body">
                <h5 class="widget-title">{{ $parentsCount }}</h5>
            </div>
        </div>
        <div class="dashboard-widget students">
            <div class="widget-header">Students</div>
            <div class="widget-body">
                <h5 class="widget-title">{{ $studentsCount }}</h5>
            </div>
        </div>
        <div class="dashboard-widget teachers">
            <div class="widget-header">Teachers</div>
            <div class="widget-body">
                <h5 class="widget-title">{{ $teachersCount }}</h5>
            </div>
        </div>
    </div>

    <!-- New Row for Latest Messages and Incoming Appointments -->
    <div class="dashboard-info-cards">
        <!-- Latest Messages -->
        <div class="info-card">
            <div class="info-card-header">
                <h5>Latest Messages</h5>
            </div>
            <div class="info-card-body">
                @if($latestMessages->isEmpty())
                <p>No new messages.</p>
                @else
                <ul class="info-list">
                    @foreach($latestMessages as $message)
                    <li class="info-list-item">
                        <div class="info-list-header">
                            <strong>{{ $message->sender_name }}</strong>
                            <span class="info-date">{{ $message->created_at->format('d M Y H:i') }}</span>
                        </div>
                        <p>{{ Str::limit($message->message, 100) }}</p>
                    </li>
                    @endforeach
                </ul>
                <a href="" class="dashboard-btn">View All Messages</a>
                @endif
            </div>
        </div>

        <!-- Incoming Appointments -->
        <div class="info-card">
            <div class="info-card-header">
                <h5>Incoming Appointments</h5>
            </div>
            <div class="info-card-body">
                @if($incomingAppointments->isEmpty())
                <p>No upcoming appointments.</p>
                @else
                <ul class="info-list">
                    @foreach($incomingAppointments as $appointment)
                    <li class="info-list-item">
                        <div class="info-list-header">
                            <strong>{{ $appointment->father_name ?? 'N/A' }}</strong>
                            <span class="info-date">{{ $appointment->visit_date_time }} at {{ $appointment->time
                                }}</span>
                        </div>
                        <p>{{ Str::limit($appointment->description, 100) }}</p>
                    </li>
                    @endforeach
                </ul>
                <a href="{{ route('appointments.index') }}" class="dashboard-btn">View All Appointments</a>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    .dashboard-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .dashboard-widgets {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 30px;
    }

    .dashboard-widget {
        flex: 1;
        min-width: 200px;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .widget-header {
        padding: 10px;
        font-weight: bold;
        color: #fff;
    }

    .widget-body {
        padding: 20px;
        background-color: #fff;
    }

    .widget-title {
        font-size: 24px;
        margin: 0;
    }

    .appointments .widget-header {
        background-color: #007bff;
    }

    .messages .widget-header {
        background-color: #28a745;
    }

    .parents .widget-header {
        background-color: #ffc107;
    }

    .students .widget-header {
        background-color: #dc3545;
    }

    .teachers .widget-header {
        background-color: #17a2b8;
    }

    .dashboard-info-cards {
        display: flex;
        gap: 20px;
    }

    .info-card {
        flex: 1;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .info-card-header {
        background-color: #f8f9fa;
        padding: 15px;
        border-bottom: 1px solid #e9ecef;
    }

    .info-card-header h5 {
        margin: 0;
        font-size: 18px;
    }

    .info-card-body {
        padding: 20px;
    }

    .info-list {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .info-list-item {
        border-bottom: 1px solid #e9ecef;
        padding: 15px 0;
    }

    .info-list-item:last-child {
        border-bottom: none;
    }

    .info-list-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 5px;
    }

    .info-date {
        font-size: 0.9em;
        color: #6c757d;
    }

    .dashboard-btn {
        display: inline-block;
        background-color: #007bff;
        color: #fff;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 14px;
        transition: background-color 0.3s;
    }

    .dashboard-btn:hover {
        background-color: #0056b3;
    }
</style>
@endsection

@section('scripts')



@endsection