@extends('layouts.app')

@section('title', 'Client Dashboard')

@section('content')
    <div class="dashboard-container">
        <h2 class="welcome-message">Client Dashboard</h2>
        
        <div class="content-section">
            <h3>Available Conferences</h3>
            <div class="conference-list">
                <!-- Conference list will go here -->
                <p class="text-muted">No conferences available at the moment.</p>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .dashboard-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .welcome-message {
        text-align: center;
        margin-bottom: 30px;
        color: #333;
    }
    .content-section {
        margin-bottom: 30px;
    }
    .content-section h3 {
        color: #333;
        margin-bottom: 20px;
    }
</style>
@endsection 