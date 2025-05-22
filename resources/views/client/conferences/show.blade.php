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
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <h4>{{ $conference->title }}</h4>
                        <hr>
                        <p><strong>Date and Time:</strong> {{ $conference->date->format('Y-m-d H:i') }}</p>
                        <p><strong>Location:</strong> {{ $conference->location }}</p>
                        <p><strong>Available Spots:</strong> 
                            @if($conference->capacity)
                                {{ $conference->capacity - $conference->registrations()->count() }} / {{ $conference->capacity }}
                            @else
                                Unlimited
                            @endif
                        </p>
                        <div class="mt-3">
                            <h5>Description</h5>
                            <p>{{ $conference->description }}</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        @auth
                            @if($isRegistered)
                                <form action="{{ route('client.conferences.unregister', $conference) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Unregister</button>
                                </form>
                            @else
                                <form action="{{ route('client.conferences.register', $conference) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Register for Conference</button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">Login to Register</a>
                        @endauth
                        <a href="{{ route('client.conferences.index') }}" class="btn btn-secondary">Back to Conferences</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 