@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('conferences.title') }}</span>
                    <a href="{{ route('admin.conferences.create') }}" class="btn btn-primary">
                        {{ __('conferences.actions.create') }}
                    </a>
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
                                    <th>{{ __('conferences.title') }}</th>
                                    <th>{{ __('conferences.date') }}</th>
                                    <th>{{ __('conferences.location') }}</th>
                                    <th>{{ __('conferences.status.title') }}</th>
                                    <th>{{ __('conferences.actions.title') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($conferences as $conference)
                                <tr>
                                    <td>{{ $conference->title }}</td>
                                    <td>{{ $conference->date->format('Y-m-d H:i') }}</td>
                                    <td>{{ $conference->location }}</td>
                                    <td>
                                        @if($conference->date->isPast())
                                            {{ __('conferences.status.past') }}
                                        @else
                                            {{ __('conferences.status.upcoming') }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.conferences.edit', $conference) }}" class="btn btn-primary btn-sm">
                                            {{ __('conferences.actions.edit') }}
                                        </a>
                                        @if(!$conference->date->isPast())
                                            <form action="{{ route('admin.conferences.destroy', $conference) }}" 
                                                  method="POST" 
                                                  class="d-inline"
                                                  data-confirm="{{ __('conferences.actions.confirm_delete') }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    {{ __('conferences.actions.delete') }}
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 