@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Conferences</h5>
                    <a href="{{ route('admin.conferences.create') }}" class="btn btn-primary">Add New Conference</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Location</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($conferences as $conference)
                                    <tr>
                                        <td>{{ $conference->title }}</td>
                                        <td>{{ $conference->date->format('Y-m-d H:i') }}</td>
                                        <td>{{ $conference->location }}</td>
                                        <td>
                                            <a href="{{ route('admin.conferences.edit', $conference) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('admin.conferences.destroy', $conference) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this conference?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{ $conferences->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 