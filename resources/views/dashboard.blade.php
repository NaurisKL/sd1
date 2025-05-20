@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="dashboard-container">
        <h2 class="welcome-message">Welcome to the Conference System</h2>
        
        <div class="student-info">
            <h1>Nauris Kliucius</h1>
            <p>PIT-21-NL</p>
        </div>
        
        <div class="menu-options">
            <div class="menu-option">
                <h3>Client</h3>
                <p>Access client features and view conferences</p>
                <a href="{{ route('client') }}" class="btn btn-primary">Enter as Client</a>
            </div>
            
            <div class="menu-option">
                <h3>Employee</h3>
                <p>Manage conferences and handle registrations</p>
                <a href="{{ route('employee') }}" class="btn btn-success">Enter as Employee</a>
            </div>
            
            <div class="menu-option">
                <h3>Admin</h3>
                <p>System administration and user management</p>
                <a href="{{ route('admin') }}" class="btn btn-danger">Enter as Admin</a>
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
    .menu-options {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }
    .menu-option {
        text-align: center;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        transition: transform 0.2s;
    }
    .menu-option:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .menu-option h3 {
        margin-bottom: 15px;
        color: #333;
    }
    .menu-option p {
        color: #666;
        margin-bottom: 15px;
    }
</style>
@endsection 