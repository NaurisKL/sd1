@extends('layouts.app')

@section('title', 'Employee Dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Employee Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Conferences</h5>
                                        <p class="card-text">View all available conferences and their details.</p>
                                        <a href="{{ route('employee.conferences.index') }}" class="btn btn-primary">View Conferences</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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