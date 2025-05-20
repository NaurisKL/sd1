@extends('layouts.app')

@section('title', 'Employee Dashboard')

@section('content')
    <div class="dashboard-container">
        <h2 class="welcome-message">Employee Dashboard</h2>
        
        <div class="content-section">
            <h3>Conference Management</h3>
            <div class="action-buttons">
                <a href="#" class="btn btn-primary">View Conferences</a>
                <a href="#" class="btn btn-success">Manage Registrations</a>
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
    .action-buttons {
        display: flex;
        gap: 15px;
        justify-content: center;
    }
</style>
@endsection 