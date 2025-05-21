@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Available Conferences</h5>
                </div>

                <div class="card-body">
                    <div class="row">
                        @foreach($conferences as $conference)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $conference->title }}</h5>
                                        <p class="card-text">
                                            <strong>Date:</strong> {{ $conference->date->format('Y-m-d H:i') }}<br>
                                            <strong>Location:</strong> {{ $conference->location }}
                                        </p>
                                        <p class="card-text">{{ Str::limit($conference->description, 100) }}</p>
                                        <a href="{{ route('employee.conferences.show', $conference) }}" class="btn btn-primary">View Details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{ $conferences->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 