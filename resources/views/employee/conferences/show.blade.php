@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Conference Details</h5>
                </div>

                <div class="card-body">
                    <div class="mb-4">
                        <h4>{{ $conference->title }}</h4>
                        <hr>
                        <p><strong>Date and Time:</strong> {{ $conference->date->format('Y-m-d H:i') }}</p>
                        <p><strong>Location:</strong> {{ $conference->location }}</p>
                        <div class="mt-3">
                            <h5>Description</h5>
                            <p>{{ $conference->description }}</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('employee.conferences.index') }}" class="btn btn-secondary">Back to Conferences</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 