@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
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
                        <p><strong>Total Registrations:</strong> {{ $conference->registrations()->count() }}
                            @if($conference->capacity)
                                / {{ $conference->capacity }}
                            @endif
                        </p>
                        <div class="mt-3">
                            <h5>Description</h5>
                            <p>{{ $conference->description }}</p>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h5>Registered Participants</h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Registration Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($conference->registeredUsers as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->pivot->created_at->format('Y-m-d H:i') }}</td>
                                            <td>
                                                <span class="badge bg-{{ $user->pivot->status === 'confirmed' ? 'success' : ($user->pivot->status === 'pending' ? 'warning' : 'danger') }}">
                                                    {{ ucfirst($user->pivot->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <form action="{{ route('employee.conferences.update-registration', ['conference' => $conference, 'user' => $user]) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <select name="status" class="form-select form-select-sm d-inline-block w-auto" onchange="this.form.submit()">
                                                        <option value="pending" {{ $user->pivot->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="confirmed" {{ $user->pivot->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                                        <option value="cancelled" {{ $user->pivot->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                    </select>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No registrations yet</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
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